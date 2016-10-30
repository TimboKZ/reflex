# Reflex PHP

Reflex is a simple tool that allows you to develop applications that rely on some external APIs while the APIs
themselves are not available. Additionally, it lets you simulate delayed API responses to test how your app will
perform under various conditions. See below for usage instructions.

# Using Reflex

First of all, Reflex PHP is available at [https://hosting.kawaiidesu.me/reflex/](https://hosting.kawaiidesu.me/reflex/).
Keep in mind it only works for POST requests, for all other requests a static page will be displayed. When a POST
request is made, Reflex returns the request body in plain text, unless the user tweaks any of the 3 parameters listed
below:

* `delay_seconds`: Default value: `0`. Amount of seconds by which the response will be delayed. Can be used to simulate 
bad connection or lengthy operations on server side. The maximum delay that can be set is 15 seconds.
* `content_type`: Default value: `text/plain`. The value of the `Content-Type` header that will be returned. Can be
changed to any string whatsoever.
* `data_source`: Default value: `NULL`. If you want Reflex to print out the contents of a specific POST request instead 
of the whole request body, you can use `data_source` to specify the name of said parameter.

