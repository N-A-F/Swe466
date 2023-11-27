<!DOCTYPE html>
<html style="font-size: 17px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>New Task</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Contact.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.3.3, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
   .navbar a {
        color: black;
    }

    .navbar a:hover {
        color: black;
    }

    .nav-item {
        margin-left: 40px;
        font-weight: bold;
    }
  </style>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <meta name="theme-color" content="#ad60ee">
  <meta property="og:title" content="Contact">
  <meta property="og:type" content="website">
</head>

<body class="u-body">
 <header class="u-clearfix align-items-center u-grey-80 u-header u-header" id="sec-8cd7" style="background-color: #112D4E">
  <nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="Home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
  <a class="nav-item nav-link active" href="Task.php">Add Task <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="Material.php">Add Resource</a>
      <a class="nav-item nav-link" href="ResourceTask.php">Assign Resource</a>
      <a class="nav-item nav-link " href="ResourceTaskShow.php">show Resource</a>
	        <a class="nav-item nav-link " href="TotalCost.php">calculate Cost</a>
	   <a class="nav-item nav-link " href="AllTask.php">All Tasks</a>
	    <a class="nav-item nav-link " href="AllMaterial.php">All Materials</a>
		 <a class="nav-item nav-link " href="AllCost.php">All Costs</a>
	  </div>
  </div>
</nav>

    </div>
  </header>
  <section class="u-align-left u-clearfix u-image u-section-1" id="sec-0d41" style="background-color: #DBE2EF;">
    <div class="u-align-left u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
      <form action="NewTask.php" method="post">
        <div class="u-expanded-width u-table u-table-responsive u-table-1" style="margin-top:50px">
          <table class="u-table-entity" style="margin-bottom:15px">
            <colgroup>
              <col width="20%">
              <col width="20%">
              <col width="20%">
              <col width="20%">
              <col width="20%">
            </colgroup>
            <thead class="u-palette-4-base u-table-header u-table-header-1">
              <tr style="height: 48px;">
                <th class=" -base u-palette-1-base u-table-cell u-table-cell-1"> Task ID </th>
                <th class=" -base u-palette-1-base u-table-cell u-table-cell-2"> Task Name </th>
                <th class=" -base u-palette-1-base u-table-cell u-table-cell-3"> Duration </th>
                <th class=" -base u-palette-1-base u-table-cell u-table-cell-4"> Start Date </th>
                <th class=" -base u-palette-1-base u-table-cell u-table-cell-5"> Finish Date </th>
              </tr>
            </thead>
            <tbody class="u-table-body">
              <?php
              include "db_conn.php";

              $sql = "SELECT * FROM `tasks`;";
              $result = mysqli_query($conn, $sql);

              if (!$result) {
                die("error");
              }
              $count = 1;
              //if there tasks in database
              if (mysqli_num_rows($result) > 0) {
                //insert all tasks from database
                while ($rows = mysqli_fetch_assoc($result)) {

                  $ts  = strtotime($rows['Start']);
                  $tn  = strtotime(date("Y-m-d"));
                  if ($ts >= $tn)
                    $t1 = strtotime($rows['Start']);
                  else
                    $t1  = strtotime(date("Y-m-d"));

                  $t2 = strtotime($rows['End']);
                  $differenceInSeconds = $t2 - $t1;

                  $differenceInHours = $differenceInSeconds / 3600;

                  if ($differenceInHours < 0) {
                    $sqll =  "DELETE FROM `tasks` WHERE Name = '$rows[Name]';";
                    $resultt = mysqli_query($conn, $sqll);
                    if (!$rows = mysqli_fetch_assoc($result)) {
                      break;
                    }
                    $ts  = strtotime($rows['Start']);
                    $tn  = strtotime(date("Y-m-d"));
                    if ($ts >= $tn)
                      $t1 = strtotime($rows['Start']);
                    else
                      $t1  = strtotime(date("Y-m-d"));

                    $t2 = strtotime($rows['End']);
                    $differenceInSeconds = $t2 - $t1;

                    $differenceInHours = $differenceInSeconds / 3600;
                  }

                  $differenceInDay = $differenceInHours / 24 + 1;

              ?>
                  <tr style="height: 75px;">
                    <td style="text-align: center;" class="u-border-1 u-border-grey-30 u-first-column u-table-cell u-table-cell-6"><?php echo $count ?></td>
                    <td class="u-border-1 u-border-grey-30  u-table-cell u-table-cell-7">
                      <?php echo $rows['Name']; ?>
                    </td>
                    <td style="text-align: center;" class="u-border-1 u-border-grey-30  u-table-cell u-table-cell-8">
                      <?php echo $differenceInDay; ?>
                    </td>
                    <td style="text-align: center;" class="u-border-1 u-border-grey-30  u-table-cell u-table-cell-9">
                      <?php echo $rows['Start']; ?>
                    </td>
                    <td style="text-align: center;" class="u-border-1 u-border-grey-30  u-table-cell u-table-cell-10">
                      <?php echo $rows['End']; ?>
                    </td>
                  </tr>
                <?php
                  $count++;
                }
                ?>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <input type="submit" name="submit" class="u-border-none u-btn u-button-style  u-hover-palette-1-dark-1 u-btn-1" value="Submit" style="background-color: #3F72AF">
      </form>
    </div>
  </section>


  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-61fe" style="background-color: #3F72AF">
    <section class="u-backlink u-clearfix ">
      <a class="">
        <!-- <span>created with love</span> -->
      </a>
      <p class="u-text">
        <span>created by 466 student</span>
      </p>
      <a class="" href="" target="_blank">
        <!-- <span>Group Number C7</span> -->
      </a>
    </section>
  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>