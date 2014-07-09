<?php
	require( 'StravaApi.php' );
	require( 'stravaAppCredentials.php' );

	# Create a new instance of the StravaApi class
	#
	$stravaApi = new StravaApi( $stravaClientID, $stravaClientSecret);

	# Grab the 'code' parameter passed by Strava after authentication
	#
	$code = $_GET['code'];

	# Exchange that 'code' for an 'access_token'
	#	http://strava.github.io/api/v3/oauth/#post-token
	#
	$tokenExchangeResponse = $stravaApi->tokenExchange( $code );

	# Get the 'access_token' out of the tokenExchangeResponse and store
	# it away for future API requests.
	#
	$accessToken = $tokenExchangeResponse->{'access_token'};

	# Get the 'athlete' out of the tokenExchangeResponse
	#
	$athlete = $tokenExchangeResponse->{'athlete'};

	# Display the access_token, athlete's name and profile picture
	#
	echo "Access Token: ".$accessToken."</br>";
	echo "Athlete's Name: ".$athlete->{'firstname'}." ".$athlete->{'lastname'}."</br>";
	echo "Profile Picture: <img src='".$athlete->{'profile_medium'}."'></br>";
?>
