# Schema for HackDo2

## Members
* id
* name
* email
* id_number
* admin (boolean)
* payment_info (helps us associate members)
* created_at
* updated_at

## Subscriptions
* id
* name
* type (membership, locker, letterbox, others)
* price
* active
* created_at
* updated_at

## Contracts
* id
* member_id
* subscription_id
* start_date
* end_date
* created_at
* updated_at
