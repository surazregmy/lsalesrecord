<?php 
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', action('HomeController@index'));
});

Breadcrumbs::for('listItems', function ($trail) {
    $trail->parent('home');
    $trail->push('ListItems', action('Items\ItemsController@index'));
});

Breadcrumbs::for('addItems', function ($trail) {
    $trail->parent('listItems');
    $trail->push('AddItems', action('Items\ItemsController@create'));
});

Breadcrumbs::for('showItems', function ($trail) {
    $trail->parent('listItems');
    $trail->push('ShowItems');
});

Breadcrumbs::for('editItems', function ($trail) {
    $trail->parent('listItems');
    $trail->push('EditItems');
});

// Breadcumbs for debtors
Breadcrumbs::for('listDebtors', function ($trail) {
    $trail->parent('home');
    $trail->push('ListDebtor', action('Debtors\DebtorsController@index'));
});

Breadcrumbs::for('addDebtors', function ($trail) {
    $trail->parent('listDebtors');
    $trail->push('AddDebtor', action('Debtors\DebtorsController@create'));
});

Breadcrumbs::for('showDebtors', function ($trail) {
    $trail->parent('listDebtors');
    $trail->push('showDebtor');
});

Breadcrumbs::for('editDebtors', function ($trail) {
    $trail->parent('listDebtors');
    $trail->push('EditDebtor');
});

// Breadcumbs for purchase Bill
Breadcrumbs::for('listPbills', function ($trail) {
    $trail->parent('home');
    $trail->push('ListPbills', action('Pbills\PbillsController@index'));
});

Breadcrumbs::for('addPbills', function ($trail) {
    $trail->parent('listPbills');
    $trail->push('AddPbills', action('Pbills\PbillsController@create'));
});

Breadcrumbs::for('showPbills', function ($trail) {
    $trail->parent('listPbills');
    $trail->push('showPbills');
});

Breadcrumbs::for('editPbills', function ($trail) {
    $trail->parent('listPbills');
    $trail->push('EditPbills');
});

// Breadcumbs for purchase Return Bill
Breadcrumbs::for('listPrbills', function ($trail) {
    $trail->parent('home');
    $trail->push('ListPrbills', action('Prbills\PrbillsController@index'));
});

Breadcrumbs::for('addPrbills', function ($trail) {
    $trail->parent('listPrbills');
    $trail->push('AddPrbills', action('Prbills\PrbillsController@create'));
});

Breadcrumbs::for('showPrbills', function ($trail) {
    $trail->parent('listPrbills');
    $trail->push('showPrbills');
});

Breadcrumbs::for('editPrbills', function ($trail) {
    $trail->parent('listPrbills');
    $trail->push('EditPrbills');
});

// Breadcumbs for purchase Receipt
Breadcrumbs::for('listPreceipts', function ($trail) {
    $trail->parent('home');
    $trail->push('ListPreceipts', action('Preceipts\PreceiptsController@index'));
});

Breadcrumbs::for('addPreceipts', function ($trail) {
    $trail->parent('listPreceipts');
    $trail->push('AddPreceipts', action('Preceipts\PreceiptsController@create'));
});

Breadcrumbs::for('showPreceipts', function ($trail) {
    $trail->parent('listPreceipts');
    $trail->push('showPreceipts');
});

Breadcrumbs::for('editPreceipts', function ($trail) {
    $trail->parent('listPreceipts');
    $trail->push('EditPreceipts');
});

// Breadcumbs for creditors
Breadcrumbs::for('listCreditors', function ($trail) {
    $trail->parent('home');
    $trail->push('ListCreditors', action('Creditors\CreditorsController@index'));
});

Breadcrumbs::for('addCreditors', function ($trail) {
    $trail->parent('listCreditors');
    $trail->push('AddCreditors', action('Creditors\CreditorsController@create'));
});

Breadcrumbs::for('showCreditors', function ($trail) {
    $trail->parent('listCreditors');
    $trail->push('showCreditor');
});

Breadcrumbs::for('editCreditors', function ($trail) {
    $trail->parent('listCreditors');
    $trail->push('EditDebtorCreditors');
});

?>