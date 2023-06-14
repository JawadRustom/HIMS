                                                      API Admin
===============================================================================================================================
1- Analysi:(Done)
2- BloodBank:(Done)
3- Certification:()
4- CertificationEmployee:()
5- Clinic:()
6- Death:()
7- Department:()
8- Diagnosed:()
9- Disease:()
10- Employee:()
11- EmployeeType:()
12- Equipment:()
13- EquipmentBill:()
14- EquipmentType:()
15- Medicine
16- MedicineBill:()
17- Operation:()
18- Patient:()
18- PatientAnalysi:()
19- PatientAppointment:()
20- PatientMedicine:()
21- PatientsOperation:()
22- PatientSymptom:()
23- Post:()
24- Room:()
25- RoomContent:()
26- Symptom
27- User:()
28- WorkSchedule:()

                                                      Commands
===============================================================================================================================
Make Controller:
-------------------------------------------------------------------------------------------------------------------------------
  php artisan make:controller Api/AdminController/TestController --api --model=User
-------------------------------------------------------------------------------------------------------------------------------
Make Resource:
-------------------------------------------------------------------------------------------------------------------------------
  php .\artisan make:resource Api/AdminResource/Test/Action/TestResource
-------------------------------------------------------------------------------------------------------------------------------
Make Request:
-------------------------------------------------------------------------------------------------------------------------------
  php artisan make:Request Api/AdminRequest/Test/Action/TestRequest
-------------------------------------------------------------------------------------------------------------------------------