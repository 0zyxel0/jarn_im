<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', 'HomeController@showDashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/inventoryList','InventoryController@show_inventoryList');
Route::get('/invoiceTypeList','InvoiceController@show_invoiceTypes');
Route::get('/requestList','RequestProductController@show_requestList');
Route::get('/invoiceList','InvoiceController@show');
Route::get('/addNewProduct','InventoryController@add_inventoryProduct');
Route::get('/inventoryList/editProduct/{prodid}','InventoryController@edit_inventoryProduct');



Route::get('/invoiceItems/{id}','InvoiceItemListController@viewItems');
Route::get('/createInvoice','InvoiceController@create_invoiceList');
Route::get('/requestItemList/{id}','RequestProductController@requestItemStore');
Route::get('/viewReports','ReportsController@viewAvaiblableReports');
Route::get('/viewReports/transactionsOfEmployeeArea','ReportsController@view_TransactionInventoryOfEmployee');
Route::get('/viewReports/transactionsOfEmployeeArea/generatePersonReport','ReportsController@generatePersonTransactionReport');
Route::get('/viewReports/totalInventory','ReportsController@view_TotalInventoryCost');
Route::get('/viewReports/transactionsOfArea','ReportsController@view_TransactionInventoryOfArea');

Route::get('/viewReports/inventoryUsage','ReportsController@generate_Inventory_UsageReport');
Route::post('/viewReports/totalCostUsage','ReportsController@view_TotalUsageCost');


Route::post('/storeUnits','UnitCategoryController@save');
Route::post('/viewReports/createTransactionAreaReport','ReportsController@post_TransactionInventoryOfArea');
Route::post('/viewReports/createTransactionReport','ReportsController@post_TransactionInventoryOfEmployee');
Route::post('/newInventoryProduct','InventoryController@save_newProduct');
Route::post('/storeCategory','CategoryController@saveCategory');
Route::post('/storeInvoice','InvoiceController@store');
Route::post('/storeRequestList','RequestProductController@store');
Route::post('/store','SupplierController@store');
Route::post('/requestItemList/saveRequestConfirmation','RequestProductController@updateRequestItems');
Route::post('/storeInvoiceType','InvoiceController@save_invoiceType');



Route::get('/supplierList','SupplierController@showSupplierList');
Route::get('/personList','PersonController@viewPersonList');
Route::post('/personDataSave','PersonController@store');
Route::get('/areaList','AreaController@viewAreaList');
Route::post('/saveArea','AreaController@store');
Route::get('/categoryList','CategoryController@viewCategoryList');
Route::get('/unitList','UnitCategoryController@viewUnitList');

