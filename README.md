#Restaurant Management System (RMS)

RMS provides an online system for users to make order online. Indirectly, it involves seller (restaurant) and buyer (customer) which could bring benefits to each other and help to sustain the environment. This provides customers a completely new way to make order. By providing customers convenience and also increasing sales. Customers can generate more orders via the Internet. No time wasted for ordering taking or letting the customer browse the menu over the phone. They can do them all online. This also provide an easier way to systematic generate sales report based on the selected date which enable admin for decision making.
This system provides more reliable, usable, maintainable and dependable functions by creating quality, and easy way of keeping track management of the system, so that it can streamline all the works by a simple click. By developing this system the restaurant owner can reduce the unnecessary costs such as staff salaries, advertising costs, customer satisfaction costs etc.
When we consider the Restaurant Management System, four main subsystems can be identified.

Following entities can be identified from the above subsystems;
MEAL _CATEGORY is use to identify the meals by meal category name and meal category id which is unique. 
Meal category contains MEAL, which can be identified by name, no, image and description. 
_ODERS can be made by COUSTOMERS and maintained by STAFF. ORDER can be described with order no, order time date, total amount, payment status.
CUSTOMER, one of the key parts of this system can make PAYMENT, ORDER and RESERVATION. CUSTOMER can be identified with customer ID, first name, last name, email and mobile no. These details are needed only in online reservations.
STAFF, another key part of the restaurant, can be described using staff id, first name, last name, NIC, date of birth, gender, contact no, address, status, email, position, salary. STAFF can be divided into CHEFF and WAITERS. WAITERS’ work date and working hours are include in the system. CHEFF has position and food category. STAFF make orders, maintain reservation and maintain the payment transactions.
PAYMENT, done by CUSTOMERS and maintained by STAFF for ORDER and RESERVATION. This can be categorized in to CREDITCARD and CASH. PAYMENT includes payment no, date, grand charge, service charge, total charge, deposit and balance.
One of the methods of payment is CREDITCARD, which defines with credit card no, type and connected with CUSTOMER.
CUSTOMERS can make RESERVATIONS (online and offline), which has id, time, date and connected with TABLE.
CUSTOMERS reserve TABLE, which contain table no, size (no of chairs), zone (located area of restaurant) and status (availability)
Assumptions: 
•	No deliveries: every customer has to arrive at the restaurant to receive the ordered items.
•	Optionally, tables can be reserved online.
•	Orders and table reservations are assigned to a particular staff member.
•	Every transaction between customer and cashier is recorded, no matter how small.
•	No payback after online payments.
