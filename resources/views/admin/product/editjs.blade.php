<script type="text/javascript">
         var ue = UE.getEditor('container');
         ue.ready(function() {
		    ue.setContent('{!! $product->content !!}');
		 });

		 var ueTraffic = UE.getEditor('traffic');
		 ueTraffic.ready(function() {
		    ueTraffic.setContent('{!! $product->traffic !!}');
		 });			 
         var ueHotel = UE.getEditor('hotel');
         ueHotel.ready(function() {
		    ueHotel.setContent('{!! $product->hotel !!}');
		 });
         var ueQA = UE.getEditor('qa');
         ueQA.ready(function() {
		    ueQA.setContent('{!! $product->qa !!}');
		 });

         $('#tags').select2();


     </script>