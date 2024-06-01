DELIMITER $$

CREATE TRIGGER after_insert_signals
AFTER INSERT ON signals
FOR EACH ROW
BEGIN
  DECLARE done INT DEFAULT FALSE;
  DECLARE uname VARCHAR(255);
  DECLARE cur CURSOR FOR
    SELECT DISTINCT uname
    FROM attempts
    WHERE verdict = 1
      AND created_at BETWEEN (SELECT start_time FROM contests WHERE id = NEW.contest_id)
                        AND (SELECT end_time FROM contests WHERE id = NEW.contest_id)
      AND p_id IN (SELECT id FROM problems WHERE c_id = NEW.contest_id);
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

  OPEN cur;

  read_loop: LOOP
    FETCH cur INTO uname;
    IF done THEN
      LEAVE read_loop;
    END IF;

    -- Calculate sum of xp for the user within the contest timeframe
    SET @sum_xp = (
      SELECT SUM(xp)
      FROM attempts
      WHERE uname = uname
        AND verdict = 1
        AND created_at BETWEEN (SELECT start_time FROM contests WHERE id = NEW.contest_id)
                          AND (SELECT end_time FROM contests WHERE id = NEW.contest_id)
        AND p_id IN (SELECT id FROM problems WHERE c_id = NEW.contest_id)
    );

    -- Calculate max penalty for the user within the contest timeframe
    SET @max_penalty = (
      SELECT MAX(penalty)
      FROM attempts
      WHERE uname = uname
        AND created_at BETWEEN (SELECT start_time FROM contests WHERE id = NEW.contest_id)
                          AND (SELECT end_time FROM contests WHERE id = NEW.contest_id)
        AND p_id IN (SELECT id FROM problems WHERE c_id = NEW.contest_id)
    );

    -- Calculate gained rating
    SET @gained_rating = @sum_xp - IFNULL(@max_penalty, 0);

    -- Insert or update the rating in the ratings table
    INSERT INTO ratings (uname, c_id, rating, created_at, updated_at)
    VALUES (uname, NEW.contest_id, @gained_rating, NOW(), NOW())
    ON DUPLICATE KEY UPDATE
      rating = VALUES(rating),
      updated_at = VALUES(updated_at);

  END LOOP;

  CLOSE cur;
END$$

DELIMITER ;
