@component('mail::message')
# New product

A new product has been added.

## Designation: 
{{$produit->designation}}

## Prix: 
{{$produit->prix}}

## Description: 
{{$produit->description}}


This is a test mail.

@component('mail::button', ['url' => url("/list-produits")])
View product

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

