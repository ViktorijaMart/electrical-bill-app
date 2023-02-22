# Electrical Bill App

This app was a final exam project for the PHP section (without frameworks).

It has two pages:

- The first one shows the form to input data.

![image](https://user-images.githubusercontent.com/106098961/220601488-f8e03b6e-74f7-4f0e-abd5-34670e6fba5a.png)

- On the second page the user can see unpaid bills, the payment total, and declare and pay those bills.

![image](https://user-images.githubusercontent.com/106098961/220601355-beefec71-4685-440b-96ea-f9b97e792ed0.png)

## Requirements

- The user can only pay for the previous month. If the user tries to pay for the months before last they should receive an error 'You are late to pay this bill by x days'. If the user tries to pay the future bill they should receive an error 'This payment is too early'.
- The form only checks the month, not the year.
- After the user submits the correct data, it is saved to a JSON file.
- In the 'Unpaid Bills' page the user should see all the UNPAID bills. After the user presses the 'Declare and Pay' button in JSON file these bills should be noted as paid and not shown again.

## Details

By doing this project I gained even more practice in:

- Using Composer and its autoloader functionality
- Router functionality
- Object-oriented programming
- PSR-4 standards

But, to be honest, this is not my proudest project, as it has many mistakes, I couldn't fix due to limited time (being an exam). These are the ones I would like to point out:

- error handling is not the best as it brakes router functionality. 
- I didn't add the 'required' attribute on inputs.
- The main focus of this project was to showcase my PHP skills. However, I still want to point out these CSS mistakes:
    - On button cursor should be the pointer.
    - On the form page 'Go to Payment' section is longer than the form section.
    
## Built with

- PHP
- Composer
- HTML
- CSS
