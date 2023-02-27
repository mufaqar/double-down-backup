<?php /* Template Name: Cart */

//get_header('landing');





$request_body = '{
  "order": {
      "items": [
          {
              "reference": "REj",
              "name": "Item name",
              "quantity": 5,
              "unit": "",
              "unitPrice": 1000,
              "taxRate": 0,
              "taxAmount": 0,
              "grossTotalAmount": 1000,
              "netTotalAmount": 1000
          }
      ],
      "amount": 1000,
      "currency": "NOK",
      "reference": "Ref"
  },
  "checkout": {
      "url": "",
      "integrationType": "EmbeddedCheckout",
      "returnUrl": "",
      "cancelUrl": "",
      "consumer": {
          "reference": "Cart",
          "email": "mufaqar@gmail.com",
          "shippingAddress": {
              "addressLine1": "H # 134",
              "addressLine2": "",
              "postalCode": "54000",
              "city": "Lahore",
              "country": "Pakistan"
          },
          "phoneNumber": {
              "prefix": "+92",
              "number": "3026006280"
          },
          "privatePerson": {
              "firstName": "Mufaqar",
              "lastName": "Islam"
          },
          "company": {
              "name": "SG",
              "contact": {
                "firstName": "Mufaqar",
                "lastName": "Islam"
              }
          }
      },
      "termsUrl": "/terms",
      "merchantTermsUrl": "terms",
      "shippingCountries": [
          {
              "countryCode": "92"
          }
      ],
      "shipping": {
          "countries": [
              {
                  "countryCode": "string"
              }
          ],
          "merchantHandlesShippingCost": true,
          "enableBillingAddress": true
      },
      "consumerType": {
          "default": "string",
          "supportedTypes": [
              "string"
          ]
      },
      "charge": true,
      "publicDevice": true,
      "merchantHandlesConsumerData": true,
      "appearance": {
          "displayOptions": {
              "showMerchantName": true,
              "showOrderSummary": true
          },
          "textOptions": {
              "completePaymentButtonText": "string"
          }
      },
      "countryCode": "string"
  },
  "merchantNumber": "string",
  "notifications": {
      "webHooks": [
          {
              "eventName": "string",
              "url": "string",
              "authorization": "string",
              "headers": null
          }
      ]
  },
  "subscription": {
      "subscriptionId": "d079718b-ff63-45dd-947b-4950c023750f",
      "endDate": "2019-08-24T14:15:22Z",
      "interval": 0
  },
  "unscheduledSubscription": {
      "create": true,
      "unscheduledSubscriptionId": "92143051-9e78-40af-a01f-245ccdcd9c03"
  },
  "paymentMethodsConfiguration": [
      {
          "name": "string",
          "enabled": true
      }
  ],
  "paymentMethods": [
      {
          "name": "string",
          "fee": {
              "reference": "string",
              "name": "string",
              "quantity": 0,
              "unit": "string",
              "unitPrice": 0,
              "taxRate": 0,
              "taxAmount": 0,
              "grossTotalAmount": 0,
              "netTotalAmount": 0
          }
      }
  ],
  "myReference": "string"
}';

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://test.api.dibspayment.eu/v1/payments",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_SSL_VERIFYPEER => "false",
  CURLOPT_POSTFIELDS => $request_body,
  CURLOPT_HTTPHEADER => [
    "Authorization: test-secret-key-90d47cae99df4ffa8ccf386d9d104441",
    "CommercePlatformTag: SOME_STRING_VALUE",
    "content-type: application/*+json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
