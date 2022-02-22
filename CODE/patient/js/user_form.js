
$(document).ready(function(){
    ajax_call();
});

var urlParams = new URLSearchParams(window.location.search);
var myParam = urlParams.get('id');
var symptom_description = [];

function ajax_call(str)
{
  $.ajax({
      url   : "../patient/symptom_description.php",
      type  : "POST",
      async : false,
      data  : {
       'id' :myParam
              },
      success: function(data)
      {
          //alert(data);
          //console.log(data);
          symptom_description = data.split('|');
          //console.log(symptom_description);
          // for(var i=0; i<11; i++){
          //     console.log(tmp[i]);
          //     symptom_description.push(tmp[i]);
          // }
      }
  });

    $.ajax({
        url   : "../patient/user_form.php",
        type  : "POST",
        async : false,
        data  : {
            'id' :myParam
                   },
        success: function(data)
        {
            //alert(data);
            make_array(data);
        }
    });


}

var sname = [];
var fv = [];

function make_array(str)
{
    var ar = str.split('|');
    for (var i = 0; i < ar.length; i++) {
        var ind = ar[i].indexOf(',');
        sname[i] = ar[i].substring(0,ind);
        fv[i] = ar[i].substring(ind+1,ar[i].length).split(',');
        //alert(sname[i]+" "+fv[i]);
    }
    show();
}

function show()
{
    //console.log(fv.length);
    var tb1 = '<div class=""><table class="table table-responsive table-bordered "><thead><tr><th>Symptom </th><th>Value</th><th>Symptom Description</th></tr></thead><tbody>';
  	var tb2 = '</tbody></table></div>';
    for (var i = 0; i < sname.length; i++) {
        var box = '<tr><td class = "sname">'+sname[i]+' :- </td>';
        box = box +'<td><select class=" form-control" id="s'+i+'">'+(i+1)+' '+sname[i];

        for (var j = 0; j < fv[i].length; j++) {
            var t;
            if(fv[i][j] ==="1"){
                 t = '<option value="'+fv[i][j]+'">'+"Yes"+'</option>';
            }else if(fv[i][j] ==="0"){
                t = '<option value="'+fv[i][j]+'">'+"No"+'</option>';
            }else{
                t = '<option value="'+fv[i][j]+'">'+fv[i][j]+'</option>';
            }
          
            box += t;
        }

        box+='</select></td>';
        
        box += '<td>'+ symptom_description[i] +'</td></tr>';
        tb1 = tb1+box;
    }
    $("#add_here").append(tb1+tb2);
}

var json;
function make_string()
{
    $('#results').children().remove();
    var str = '';
    for (var i = 0; i < sname.length; i++) {
        str = str +sname[i]+','+$("#s"+i).val();
        if(sname.length-1!=i)
            str += '|';
    }

    console.log(str)
     $.ajax({
        url   : "../patient/evaluate.php",
        type  : "POST",
        async : false,
        data  : {
            'id' :myParam,
            'str':str
                   },
        success: function(data)
        {
                    console.log(data)
                //  alert(data);
                    json = JSON.parse(data);
               //     var json = window.opener.getJSON();
            //alert(json);
            var len = json.length;
            var i = 1;
            var str = '';

            var tuple1 = '<td><button class="btn btn-primary" onclick="precaution(this)"  id="';
            var tuple2 = '">Precautions</button></td>';
        //<td><button class="btn btn-primary" onclick="initMap(this)"  id="
            var tb1 = '<div class="vertical-gap"><table class="table table-responsive table-bordered "><thead><tr><th>Sr No. </th><th>Disease</th><th>Severity(in %)</th><th>Prediction Result</th><th>Precautions</th></tr></thead><tbody>';
            var tb2 = '</tbody></table></div>';
            for(key in json){

                str += '<tr><td>'+i+'</td>'+'<td>'+key+'</td>'+'<td>'+json[key].toFixed(2)+'</td>';
                var danger = '<td class="text-danger">High Possibility of '+key+'</td>';
                var normal = '<td class="text-success">Low Possibility of '+key+'</td>';
                if(json[key] > 50)
                    str += danger;
                else
                    str += normal;

                str += tuple1+key+tuple2+'</tr>';

                //Nearby Doctors</button></td>
                //alert(str);
                console.log(key + "==>" + json[key]);
                i++;
            }
            $('#results').append(tb1+str+tb2);
            //        w = window.open("../patient/result.php", "Result");
                }
    });
    
}


function accuracy()
{

}

function getJSON(){
        return json;
}
function precaution(e)
{
	//alert(e.id);
	$.ajax
	({
			url : "../patient/map.php",
			type : "POST",
			data : {
				"disease" : e.id,
				"type" : 0
			},
			success : function(data){
				$('#precaution').html('<div id ="prec1" class="jumbotron text-justify" style="font-family:Comic Sans MS, cursive, sans-serif">');
				$('#prec1').html('<h2>Precaution for '+e.id+' </h2>'+data+'</div>');
				

				//animate
				$('html, body').animate({
					scrollTop: $("#prec1").offset().top
		        }, 3000);
				//console.log(data);
			},
			error : function(err)
			{
				alert('error in ajax');
			}
	});

}

