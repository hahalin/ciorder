//2016/4/19
//測試jquery ajax 於session timeout後的處理
//對應controller api/test
//ref links
//http://stackoverflow.com/questions/22527412/403-forbidden-access-to-codeigniter-controller-from-ajax-request?rq=1
//http://stackoverflow.com/questions/6700822/jquery-how-to-get-the-http-status-code-from-within-the-ajax-error-method

$(document).ready(function(){
		return;

		var CFG = {
	        url: '<?php echo $this->config->item('base_url');?>',
	        token: '<?php echo $this->security->get_csrf_hash();?>'
    	};
    	
    	$.ajax({
		  
		});

    	$.ajaxSetup({
                statusCode: {
                	401: function () {
                         alert('401 ajax setup');

                    },
                    404: function () {
                         alert('404 ajax setup');

                    },
                    200: function(){
                    	alert('200 ajax setup');
                    }
                }
        });


  //   	$.get("/admin/dashboard/get",
		// 		success:function(data){
		// 			console.log(data);
		// 		},
		// 		function(data)
		// 		{
		// 			console.log(data);
		// 		},
		// 		function(data)
		// 		{
		// 			console.log(data);
		// 		}
		// );
		// return;

    	$.ajax({
		    type: 'GET',
		    url: '/wine/admin/dashboard/get',
		    //data: $form.serialize(),
		    success: function(data){
		        alert('success! 200 status code!');
		    },
		    error: function(jqXHR, textStatus, errorThrown) {
			    alert(jqXHR.status);
			    alert(textStatus);
			    alert(errorThrown);
			},
			statusCodea: {
			  	401: function() {
			      alert('401 status code! user error');
			    },
			    404: function() {
			      alert('404 status code! user error');
			    },
			    500: function() {
			      alert('500 status code! server error');
			    }
		 	}
		});

    	return;
		try
		{
			$.get("/wine/admin/dashboard/get",
				function(data){
					console.log(data);
				},
				function(data)
				{
					console.log(data);
				},
				function(data)
				{
					console.log(data);
				}
			);
		}
		catch(ex)
		{
			console.log(ex);
		}

	});
	