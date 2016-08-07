<!DOCTYPE HTML>
<html>

<head>
  <title>Linux AutoBuild</title>
  <meta name="linux" content="Linux build site" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
   <script type="text/javascript" src="js/jquery.min.js"> </script>  
   <script type="text/javascript" src="js/reports.js"> </script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Linux <span class="logo_colour">AutoBuild</span></a></h1>
          <h2>CIS 5690 - Advanced Systems Project</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Home</a></li>
          <li class="selected"><a href="user.php">User Reports</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <h4>Web API Launched</h4>
        <h5>August 5th, 2016</h5>
        <p>Web API developed for Linux Administrators, which can be used to create bootable images . <br /><a href="#">Read more</a></p>
        <p></p>
        <h3>Useful Docs</h3>
        <ul>
          <li><a href="docs/ldap.pdf">LDAP Guide</a></li>
          <li><a href="docs/prep.pdf">Build Server Prep</a></li>
          <li><a href="docs/autobuild.pdf">Autobuild Guide</a></li>
          <li><a href="docs/vmware.pdf">Vm Template Guide</a></li>
        </ul>
      </div>
      <div id="content">
        <!-- insert the page content here -->
      <h1>Generate User Login Reports </h1>
      <p>
      Welcome to login report page!!
      <br>
     Please select the options from drop down and click on submit to generate the report.<br>
    
      </p>
      
      <form>
          <div class="form_settings">
		<p><span>Select Report</span><select id="reoprtdropdown">
		<option value="1">Get Last 5 Logins from the server</option>
		<option value="2">Generate Weekly Report</option>
		<option value="3">Display System Load</option>
		<option value="4">Display performance Data</option>
		</select>
		</p>
  
  <p style="padding-top: 15px"><span>&nbsp;</span><input id="report" class="submit" type="button" value="Submit" /></p>
          </div>
        </form>
 
         <br><br>
         
        <p class='showprogress' id='uresult'>
        </p>
        
        <div id="display">
        
        </div>
     
       <!--content ends here -->
       </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Lal Pasha Shaik | <a href="#">UCMO</a> | <a href="#">CIS Department</a>
    </div>
  </div>
</body>
</html>
