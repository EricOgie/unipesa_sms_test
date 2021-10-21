# unipesa_sms_test
This project is a submission for Unipesa screenng exercise. It is a demostration of the use of Clickatel sms API with vanilla PHP.

### TO TEST:
cd into the project directory and run "php -S 127.0.0.1:8000" depending on your local machine server.

To simulate a call to the API, make a POST request with a form data as follows:

```
ENDPOINT : "/send-sms" 
URL CONSTRUCT = {Base_URL}/{ENDPOINT}


FORM DATA
{
  "phone":"Eleven Digit number",
  "country_code:"country code"
}

```

On success, the response report should look like below

```
{
   "messages":[
      {
         "apiMessageId":"c0de673a6e5c4e489794cb414482bc72",
         "accepted":true,
         "to":"2347010585615"
      }
   ],
   "error":null
}1

```

### NOTE:
 I added a simple validation checker to ensure that the phone is exactly 11-digits long and that it begin with a zero, 0. 
 If for any reason the number you are testing with is not of the format, the program will flag it with a 422 error code.



