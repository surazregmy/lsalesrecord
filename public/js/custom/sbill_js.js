$(function(){
    calculaterow();
    calculatefinaltotal();
    calculateremamt();
})

function grandtotal()  {  
    var t=0;  
    $('.total').each(function(i,e)   
    {  
    var amt =$(this).val()-0;  
    t+=amt;  
    });  
    $('.grandtotal').val(t);  
    $('#total_amount').val(t);

    var fin_disc = $('.final_discount').val();
    var grand_total = $('.grandtotal').val();
    var fin_total = grand_total - fin_disc;
    $('.final_total').val(fin_total);
} 

function calculaterow(){
    $('body').on('keyup','.quantity,.rate,.total,.discount',function(){  
        var tr=$(this).parent().parent();  
        var qty=tr.find('.quantity').val();  
        var discount = tr.find('.discount').val();  
        var price=tr.find('.rate').val();
        var dis_price = price - (discount/100 * price);
        var amt =(qty * dis_price);  
        tr.find('.total').val(amt);  
        grandtotal();  
      });  
}

function calculaterowselect(tr){
        // var tr=$(x).parent().parent();  
        var qty=tr.find('.quantity').val();  
        var discount = tr.find('.discount').val();  
        var price=tr.find('.rate').val();
        var dis_price = price - (discount/100 * price);
        var amt =(qty * dis_price);  
        tr.find('.total').val(amt);  
        grandtotal();   
}

function calculatefinaltotal(){
    $('body').on('keyup','.final_discount,.final_total,.grandtotal,.quantity,.rate,.total,.discount',function(){  
        var fin_disc = $('.final_discount').val();
        var grand_total = $('.grandtotal').val();
        var fin_total = grand_total - fin_disc;
        $('.final_total').val(fin_total);

    });
}
function calculatefinaltotalselect(){
        var fin_disc = $('.final_discount').val();
        var grand_total = $('.grandtotal').val();
        var fin_total = grand_total - fin_disc;
        $('.final_total').val(fin_total);

}
function calculateremamt(){
    $('body').on('keyup','.final_discount,.paid_amt,.rem_amt.final_total,.grandtotal,.quantity,.rate,.total,.discount',function(){  
        var fin_total = $('.final_total').val();
        var paid_amt = $('.paid_amt').val();
        var rem_amt = fin_total - paid_amt;
        $('.rem_amt').val(rem_amt);
    });
}

function calculateremamtselect(){  
        var fin_total = $('.final_total').val();
        var paid_amt = $('.paid_amt').val();
        var rem_amt = fin_total - paid_amt;
        $('.rem_amt').val(rem_amt);
}


 