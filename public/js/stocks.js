$(function() {

	$('.stock_form').submit(function(event){
  	event.preventDefault();
		addStock($('.stock_form input:first').val());
	});

	$('.lookup_form').submit(function(event){
  	event.preventDefault();
		lookupStock($('.lookup_form input:first').val());
	});

	$('.lookup_container').on('click','.lookup_add',function(){
		addStock($(this).attr('symbol'));
	});

	function addStock(stock){
		$.ajax({
		  dataType: "jsonp",
		  url: "http://dev.markitondemand.com/Api/v2/Quote/jsonp?symbol=" + stock,
		  success: function(data) {
		  	writeData(data);
		  },
		  error: function(data) {
		  	alert(stock + "is not a valid stock")
		  }
		});
	}

	function lookupStock(stock){
		$.ajax({
		  dataType: "jsonp",
		  url: "http://dev.markitondemand.com/Api/v2/Lookup/jsonp?input=" + stock,
		  success: function(data) {
		  	lookup(data);
		  },
		  error: function(data) {
		  	alert(stock + "is not a valid stock")
		  }
		});
	}

	function writeData(data){
		if(data.Status == "SUCCESS") {
			$('.stock_container .stock_container_error').empty();
			if($('.stock_container .stock_container_table tbody tr').hasClass(data.Symbol)){
				$('.stock_container .stock_container_error').html('<div class="alert alert-warning" role="alert"><p>Stock already added.</p></div>');
			} else {
				$('.stock_container .stock_container_table tbody').append("<tr class='" + data.Symbol + "'><td>" + data.Symbol + "</td><td>" + data.Name + "</td><td>$" + data.Change.toFixed(2) + "</td><td>" + data.Timestamp.slice(0,10) + data.Timestamp.slice(-5) + "</td></tr>");
				// $('.stock_container .stock_container_table tbody').append("<tr><td>" + data.Symbol + "</td><td>" + data.Name + "</td><td>$" + data.Change.toFixed(2) + "</td><td>" + data.ChangePercent.toFixed(2) + "%</td><td>" + data.ChangePercentYTD.toFixed(2) + "%</td><td>$" + data.ChangeYTD + "</td><td>$" + data.High + "</td><td>$" + data.LastPrice + "</td><td>$" + data.Low + "</td><td>$" + data.Open + "</td><td>" + data.Timestamp.slice(0,10) + data.Timestamp.slice(-5) + "</td><td>" + data.Volume.toLocaleString() + "</td></tr>");
			}
		} else {
			$('.stock_container .stock_container_error').html('<div class="alert alert-danger" role="alert"><p>No results found.</p></div>');
		}
	}

	function lookup(data){
		$('.lookup_container .lookup_container_table tbody').empty();
		if(data.length) {
			$('.lookup_container .lookup_container_error').empty();
			for (var i = data.length - 1; i >= 0; i--) {
				$('.lookup_container .lookup_container_table tbody').append("<tr><td>" + data[i].Name + "</td><td>" + data[i].Symbol + "<a class='btn btn-default btn-xs submit_button lookup_add' symbol='" + data[i].Symbol + "'>Add</a></td>");
			};
		} else {
			$('.lookup_container .lookup_container_error').html('<div class="alert alert-danger" role="alert"><p>No results found.</p></div>');
		}
	}

});
