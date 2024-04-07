   <!-- foot -->
   <div class="hm-7 vh-55 df dfc jcc aic bg-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12 df dfc jcc aic">
          <img src="{{url('rsx/logo.svg')}}" alt="" style="width: 350px;">
          <h1 class="display-1 l">MathRanker</h1>
          <p class="lead">A new horizon awaits mathematical geniuses, where they can discover their hidden talents and showcase them to the world.</p>
          <div class="container">
            <div class="row">
              <div class="col-12 df jcc">
                <a href="#" class="link-l">Adib Sakhawat</a> &nbsp;&nbsp;
                <a href="#" class="link-l">Tahsin Islam</a> &nbsp;&nbsp;
                <a href="#" class="link-l">Takia Farhin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

<!-- Add your Custom Styles here -->
<style>
    .main-home{
      background: rgb(231,236,255);
      background: radial-gradient(circle, rgba(231,236,255,1) 0%, rgba(254,254,254,0.5886729691876751) 100%);
    }

    .btn{
        border-radius: 0px;
    }

    .this-stat{

        
        margin-top: -4rem;
    }

    .glow{
        background: white;
        box-shadow: 0px 0px 10px 0px #c5c5c5;
    }

    .frst{
      margin-top: -100px;
    }

    .scnd{
      margin-top: -50px;
    }
</style>

<script>
    new DataTable('#stable');
</script>



<script>
    // Function to animate the counting process
    function animateCount(currentCount, maxCount, elementId) {
        let countElement = document.getElementById(elementId);
        let duration = 2000; // 2 seconds
        let increment = 1; // Count increment by 1

        function updateCount() {
            countElement.textContent = currentCount;
            if (currentCount < maxCount) {
                setTimeout(updateCount, duration / maxCount);
                currentCount += increment;
            }
        }

        updateCount();
    }

    // Start the animations
    //animateCount(1, 45, 'q_ct');
    //animateCount(1, 23, 'u_ct');
    //animateCount(1, 6, 'c_ct');
</script>

<script>
  // Function to toggle class and set cookie
  let l_str = "uil-moonset";
  let d_str = "uil-sun";
  let boolVariable = false;
  let html = document.querySelector("html");
  function toggleClass() {
    // Toggle the boolean variable
    boolVariable = !boolVariable;

    // Get the element with id "dmi"
    const dmiElement = document.getElementById("dmi");
    const postContent = document.getElementById("typed-math");

    // If boolVariable is true, add class "d_str", otherwise add class "l_str"
    if (boolVariable) {
      dmiElement.classList.remove('uil-moonset');
      dmiElement.classList.add('uil-sun');
      postContent.classList.remove('post-content-white');
      postContent.classList.add('post-content-dark');
      html.classList.add('dark');
      html.setAttribute('data-bs-theme', 'dark');
      // Set cookie preference to "dark"
      document.cookie = "mode=dark";
    } else {
      dmiElement.classList.remove('uil-sun');
      dmiElement.classList.add('uil-moonset');
      postContent.classList.remove('post-content-dark');
      postContent.classList.add('post-content-white');
      html.classList.remove('light');
      html.setAttribute('data-bs-theme', 'light');
      // Set cookie preference to "light"
      document.cookie = "mode=light";
    }
  }

  // Function to check cookie preference on page load
  function checkCookiePreference() {
    const cookies = document.cookie.split(";").map(cookie => cookie.trim().split("="));
    const modeCookie = cookies.find(cookie => cookie[0] === "mode");

    const html = document.querySelector("html");

    const dmiElement = document.getElementById("dmi");
    const postContent = document.getElementById("typed-math");

    if (modeCookie) {
      const mode = modeCookie[1];
      if (mode === "dark") {
        html.classList.add("dark");
        html.setAttribute("data-bs-theme", "dark");
        dmiElement.classList.remove('uil-moonset');
        dmiElement.classList.add('uil-sun');
        postContent.classList.remove('post-content-white');
        postContent.classList.add('post-content-dark');
        
      } else {
        html.classList.remove("dark");
        html.setAttribute("data-bs-theme", "light");
        dmiElement.classList.remove('uil-sun');
        dmiElement.classList.add('uil-moonset');
        postContent.classList.remove('post-content-dark');
        postContent.classList.add('post-content-white');
      }
    } else {
      // If cookie is not set, default to light mode and set cookie
      html.classList.remove("dark");
      document.cookie = "mode=light";
    }
  }

  // Add click event listener to element with id "dm"
  document.getElementById("dm").addEventListener("click", toggleClass);

  // Check cookie preference on page load
  checkCookiePreference();
</script>

<!-- Foot end -->
</body>
</html>

