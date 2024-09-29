# Design rest full api for following end point


Each endpoint description should contain URL, request/response payload and response status code.
Authentication, authorisation and registration for sellers and buyers are out of the task scope.

1) Seller "Delicious bananas LTD" (id=899) successfully adds lot of "Red Dacca" cultivar bananas, planted in Costa Rica and harvested on July 27, 2018 with total weight of 1500 kg.
2) "Delicious bananas LTD" adds lot of "Red Dacca" cultivar bananas, planted in Costa Rica and harvested on July 27, 2018 with total weight of 500 kg, but minimum weight allowed is 1000 kg.
3) "Delicious bananas LTD" changes harvesting date of created lot to June 14, 2018.
4) "Delicious bananas LTD" starts an auction on Sep 4, 2018 on the same lot with initial price $1.20/kg and duration 1 day.
5) A buyer "German Retailer GmbH" (id=72) bids on the same lot with a price $1.35/kg
6) "Delicious bananas LTD" wants to see a list of bids on his lot
7) "Delicious bananas LTD" wants to remove sold lot

Add authentication using passport.
