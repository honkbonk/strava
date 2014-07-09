StravaApi
=============

Simple PHP class to interact with Strava's V3 API.

Overview
------------

The class simply houses methods to help send data to and recieve data from the API.

Please read the [API documentation](http://strava.github.io/api/) to see what endpoints are available.

There is currently no file upload support at this time

Getting Started
------------

Include the class and instantiate with your **client_id** and **client_secret** from your [registered app](http://www.strava.com/developers):

	require( 'StravaApi.php' );

	$api = new StravaApi( $clientId, $clientSecret );

You will then need to [authenticate](http://strava.github.io/api/v3/oauth/) your strava account by requesting an access code *[1]*.  You can generate a URL for authentication using the following method:

	$api->authenticationUrl( $redirect, $approvalPrompt = 'auto', $scope = null, $state = null );

When a code is returned you must then exchange it for an [access token](http://strava.github.io/api/v3/oauth/#post-token) for the authenticated user:

	$api->tokenExchange( $code );

Example Requests
------------

Get the most recent 100 KOMs from any athlete

	$api->get( 'athletes/:id/koms', $accessToken, array( 'per_page' => 100 ) );

Post a new activity *[2]*

	$api->post( 'activities', $accessToken, array( 'name' => 'API Test', 'type' => 'Ride', 'start_date_local' => date( 'Y-m-d\TH:i:s\Z' ), 'elapsed_time' => 3600 ) ) );

Update a athlete's weight *[2]*

	$api->put( 'athlete', $accessToken, array( 'weight' => 70 ) );

Delete an activity *[2]*

	$api->delete( 'activities/:id', $accessToken );

Upload an activity *[2]*

	$uploadResponse = $api->post( 'uploads', $accessToken, array( 'activity_type' => 'ride', 'name' => 'upload test', 'description' => 'upload test description', 'data_type' => 'tcx', 'file' => '@/path/to/the/tcx/file/uploadTest.tcx') );
	
###Notes

**1**. The account you register your app will give you an access token, so you can skip this step if you're just testing endpoints/methods.

**2**. These actions will need the **scope** set to *write* when authenticating a user
