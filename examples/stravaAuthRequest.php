<?php
	require( 'StravaApi.php' );
	require( 'stravaAppCredentials.php' );

	# Create a new instance of the StravaApi class
	#
	$stravaApi = new StravaApi( $stravaClientID, $stravaClientSecret);

	# Specify the URL Strava will return to, on your site, once authentication
	# has finished (NOTE: this must by in the domain you registered with or localhost or 127.0.0.1)
	#
	$redirectURL = "http://localhost/php/stravaAPIExample/stravaAuthResponse.php";

	# Create the Strava authentication URL
	# $approvalPrompt = 'force' - always force the user to accept/grant permission
	# $scope = 'write' - allow your application to write new data to the users Strava account
	#	http://strava.github.io/api/v3/oauth/#get-authorize
	#
	$authenticationURL = $stravaApi->authenticationUrl( $redirectURL, $approvalPrompt = 'force', $scope = 'write', $state = null );

	# Provide a link to users so they can grant your application 
	# permission to access their Strava data
	#
	echo "<a href='$authenticationURL'><img src='ConnectWithStrava.png'></a>";
?>


