<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//EMPLOYEE ROUTES ARE HERE--------------
Route::get('/addEmployee', 'EmployeeController@addEmployee')->name('addEmployee');
Route::post('/insertEmployee', 'EmployeeController@insertEmployee');
Route::get('/allEmployee', 'EmployeeController@allEmployee')->name('allEmployee');
Route::get('/viewEmployee/{id}', 'EmployeeController@viewEmployee');
Route::get('/deleteEmployee/{id}', 'EmployeeController@deleteEmployee');
Route::get('/editEmployee/{id}', 'EmployeeController@editEmployee');
Route::post('/updateEmployee/{id}', 'EmployeeController@updateEmployee');

//CUSTOMERS ROUTES ARE HERE--------------
Route::get('/addCustomer', 'CustomerController@addCustomer')->name('addCustomer');
Route::post('/insertCustomer', 'CustomerController@insertCustomer');
Route::get('/allCustomer', 'CustomerController@allCustomer')->name('allCustomer');
Route::get('/viewCustomer/{id}', 'CustomerController@viewCustomer');
Route::get('/deleteCustomer/{id}', 'CustomerController@deleteCustomer');
Route::get('/editCustomer/{id}', 'CustomerController@editCustomer');
Route::post('/updateCustomer/{id}', 'CustomerController@updateCustomer');

//SUPPLIERS ROUTES ARE HERE---------------
Route::get('/addSupplier', 'SupplierController@addSupplier')->name('addSupplier');
Route::post('/insertSupplier', 'SupplierController@insertSupplier');
Route::get('/allSupplier', 'SupplierController@allSupplier')->name('allSupplier');
Route::get('/viewSupplier/{id}', 'SupplierController@viewSupplier');
Route::get('/deleteSupplier/{id}', 'SupplierController@deleteSupplier');
Route::get('/editSupplier/{id}', 'SupplierController@editSupplier');
Route::post('/updateSupplier/{id}', 'SupplierController@updateSupplier');

//salary routes start from here----------------
Route::get('/addAdvancedSalary', 'SalaryController@addAdvancedSalary')->name('addAdvancedSalary');
Route::post('/insertAdvancedSalary', 'SalaryController@insertAdvancedSalary');
Route::get('/allAdvancedSalary', 'SalaryController@allAdvancedSalary')->name('allAdvancedSalary');
Route::get('/paySalary', 'SalaryController@paySalary')->name('paySalary');

//Categories routes are here---------
Route::get('/addCategory', 'CategoryController@addCategory')->name('addCategory');
Route::post('/insertCategory', 'CategoryController@insertCategory');
Route::get('/allCategory', 'CategoryController@allCategory')->name('allCategory');
Route::get('/deleteCategory/{id}', 'CategoryController@deleteCategory');
Route::get('/editCategory/{id}', 'CategoryController@editCategory');
Route::post('/updateCategory/{id}', 'CategoryController@updateCategory');

//Products routes are here-------------
Route::get('/addProduct', 'ProductController@addProduct')->name('addProduct');
Route::post('/insertProduct', 'ProductController@insertProduct');
Route::get('/allProduct', 'ProductController@allProduct')->name('allProduct');
Route::get('/deleteProduct/{id}', 'ProductController@deleteProduct');
Route::get('/viewProduct/{id}', 'ProductController@viewProduct');
Route::get('/editProduct/{id}', 'ProductController@editProduct');
Route::post('/updateProduct/{id}','ProductController@updateProduct');

//Expenses routes are here----------
Route::get('/addExpense', 'ExpenseController@addExpense')->name('addExpense');
Route::post('/insertExpense', 'ExpenseController@insertExpense');
Route::get('/todayExpense', 'ExpenseController@todayExpense')->name('todayExpense');
Route::get('/editExpense/{id}', 'ExpenseController@editExpense');
Route::post('/updateExpense/{id}','ExpenseController@updateExpense');
Route::get('/monthlyExpense', 'ExpenseController@monthlyExpense')->name('monthlyExpense');
Route::get('/yearlyExpense', 'ExpenseController@yearlyExpense')->name('yearlyExpense');

//Monthly more expenses...............
Route::get('/januaryExpense', 'ExpenseController@januaryExpense')->name('januaryExpense');
Route::get('/februaryExpense', 'ExpenseController@februaryExpense')->name('februaryExpense');
Route::get('/marchExpense', 'ExpenseController@marchExpense')->name('marchExpense');
Route::get('/aprilExpense', 'ExpenseController@aprilExpense')->name('aprilExpense');
Route::get('/mayExpense', 'ExpenseController@mayExpense')->name('mayExpense');
Route::get('/juneExpense', 'ExpenseController@juneExpense')->name('juneExpense');
Route::get('/julyExpense', 'ExpenseController@julyExpense')->name('julyExpense');
Route::get('/augustExpense', 'ExpenseController@augustExpense')->name('augustExpense');
Route::get('/septemberExpense', 'ExpenseController@septemberExpense')->name('septemberExpense');
Route::get('/octoberExpense', 'ExpenseController@octoberExpense')->name('octoberExpense');
Route::get('/novemberExpense', 'ExpenseController@novemberExpense')->name('novemberExpense');
Route::get('/decemberExpense', 'ExpenseController@decemberExpense')->name('decemberExpense');

//Attendances routes are here............
Route::get('/takeAttendance', 'AttendanceController@takeAttendance')->name('takeAttendance');
Route::post('/insertAttendance','AttendanceController@insertAttendance');
Route::get('/allAttendance','AttendanceController@allAttendance')->name('allAttendance');
Route::get('/editAttendance/{edit_date}', 'AttendanceController@editAttendance');
Route::post('/updateAttendance','AttendanceController@updateAttendance');
Route::get('/viewAttendance/{edit_date}','AttendanceController@viewAttendance');

//settings routes are here------------
Route::get('/setting','AttendanceController@setting')->name('setting');
Route::post('/updateWebsite/{id}','AttendanceController@updateWebsite');
