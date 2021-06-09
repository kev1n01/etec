
/*---------------------------------------------------------------------------------------------------
												FUNCTIONS
---------------------------------------------------------------------------------------------------*/
function actionEdit(type,ID)
{
	window.open("registro.php?ActionType="+type+"&ID="+ID,"_self",null,true);
			
}

function AddToCard() {
	

}

/*---------------------------------------------------------------------------------------------------
												COUNTDOWN
---------------------------------------------------------------------------------------------------*/
$(function(){
  $('#countdown').countdown({
	timezone:-5,
    year: 2021,// YYYY Format
    month: 6,// 1-12
    day: 14,// 1-31
    hour: 23,// 24 hour format 0-23
    minute: 59,// 0-59
    second: 59,// 0-59	

	onFinish:function () {
	alert("Las ofertas de esta semana finalizó :'( ¡¡¡¡")
	}
  });
});
