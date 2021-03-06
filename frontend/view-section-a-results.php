<!DOCTYPE html>

<?php
session_start();

if (!(isset($_SESSION['id']) && $_SESSION['is_supervisor'] == "false")) { // Redirect the user to the log in page.
  header("Location: index.php");
}
?>
<html>
  <head>
    <title>View Section A Results | iCompute</title>

    <!-- Styles -->

    <!-- Poppins Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <!-- Foundation -->
    <link rel="stylesheet" href="_resources/css/foundation.css" />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="_resources/css/main.css" />
    <style>
      h1, h2, h3, h4, h5, h6 {
        font-family: Poppins;
      }
    </style>
  </head>

  <body>
    <?php
    include("_resources/php/navigation.php");
    ?>

    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div id="app" class="cell">
          <!-- Heading -->
          <h1>iCompute</h1>
          <h2>{{ headingTwo }}</h2>
          <h3>{{ headingThree }}</h3>

          <div v-for="test in fetchedTests">
            <h4>{{ test.name }}</h4>


          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Files -->

    <!-- jQuery -->
		<script type="text/javascript" src="_resources/js/vendor/jquery-3.3.1.js"></script>

    <!-- Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <!-- Foundation -->
		<script type="text/javascript" src="_resources/js/vendor/foundation.min.js"></script>
		<script type="text/javascript" src="_resources/js/vendor/what-input.js"></script>
		<script>
		$(document).ready(function() {
			$(document).foundation();
		});
		</script>

    <!-- Fetching and Getting Data -->
		<script type="text/javascript" src="_resources/js/managing-data.js"></script>

    <!-- Section Script -->
    <script>
    var app = new Vue({
      el: '#app',

      data: {
        // Headings
        headingTwo: "Administrative Access",
        headingThree: "View Section A Results",

        fetchedIndividualAnswers: [],

        fetchedTests: [],

        fetchedQuestions: [],

        fetchedUsers: []
      },

      methods: {

      },

      mounted: function() {
        console.log("App mounted.");

        fetchData('_resources/txt/section-a-individual-answers.txt', this.fetchedIndividualAnswers);

        fetchData('_resources/txt/section-a-tests.txt', this.fetchedTests);

        fetchData('_resources/txt/section-a-questions.txt', this.fetchedQuestions);

        fetchData('_resources/txt/users.txt', this.fetchedUsers);
      },

      watch: {

      }
    });
    </script>
  </body>
</html>
