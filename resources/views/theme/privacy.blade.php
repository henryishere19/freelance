@extends('layouts.theme.master')

@section('content')
<main id="main">

<section class="tearms-condition" id="tearms-condition">
	<div class="container">
		<div class="section-title mb-lg-5">
			<h2>Privacy Statement</h2>
		</div>
		<div class="tearms-condition-content">
			<p>Intuitive Technology Partners, Inc. is committed to protecting your privacy and developing technology that gives you the most powerful and safe online experience. This Statement of Privacy applies to the Intuitive Technology Partners, Inc. Web site and governs data collection and usage. By using the Intuitive Technology Partners, Inc. website, you consent to the data practices described in this statement.</p>
			<ul>
				<li>
					<h4>Collection of your Personal Information</h4>
					<p>Intuitive Technology Partners, Inc. collects personally identifiable information, such as your e-mail address, name, home or work address or telephone number. Intuitive Technology Partners, Inc. also collects anonymous demographic information, which is not unique to you, such as your ZIP code, age, gender, preferences, interests and favorites.</p>
					<p>There is also information about your computer hardware and software that is automatically collected by Intuitive Technology Partners, Inc.. This information can include: your IP address, browser type, domain names, access times and referring Web site addresses. This information is used by Intuitive Technology Partners, Inc. for the operation of the service, to maintain quality of the service, and to provide general statistics regarding use of the Intuitive Technology Partners, Inc. Web site.</p>
					<p>Please keep in mind that if you directly disclose personally identifiable information or personally sensitive data through Intuitive Technology Partners, Inc. public message boards, this information may be collected and used by others. Note: Intuitive Technology Partners, Inc. does not read any of your private online communications.</p>
					<p>Intuitive Technology Partners, Inc. encourages you to review the privacy statements of Web sites you choose to link to from Intuitive Technology Partners, Inc. so that you can understand how those Web sites collect, use and share your information. Intuitive Technology Partners, Inc. is not responsible for the privacy statements or other content on Web sites outside of the Intuitive Technology Partners, Inc. and Intuitive Technology Partners, Inc. family of Web sites.</p>
				</li>
				<li>
					<h4>Use of your Personal Information</h4>
					<p>Intuitive Technology Partners, Inc. collects and uses your personal information to operate the Intuitive Technology Partners, Inc. Web site and deliver the services you have requested. Intuitive Technology Partners, Inc. also uses your personally identifiable information to inform you of other products or services available from Intuitive Technology Partners, Inc. and its affiliates. Intuitive Technology Partners, Inc. may also contact you via surveys to conduct research about your opinion of current services or of potential new services that may be offered.</p>
					<p>Intuitive Technology Partners, Inc. does not sell, rent or lease its customer lists to third parties. Intuitive Technology Partners, Inc. may, from time to time, contact you on behalf of external business partners about a particular offering that may be of interest to you. In those cases, your unique personally identifiable information (e-mail, name, address, telephone number) is not transferred to the third party. In addition, Intuitive Technology Partners, Inc. may share data with trusted partners to help us perform statistical analysis, send you email or postal mail, provide customer support, or arrange for deliveries. All such third parties are prohibited from using your personal information except to provide these services to Intuitive Technology Partners, Inc., and they are required to maintain the confidentiality of your information.</p>
					<p>Intuitive Technology Partners, Inc. does not use or disclose sensitive personal information, such as race, religion, or political affiliations, without your explicit consent.</p>
					<p>Intuitive Technology Partners, Inc. keeps track of the Web sites and pages our customers visit within Intuitive Technology Partners, Inc., in order to determine what Intuitive Technology Partners, Inc. services are the most popular. This data is used to deliver customized content and advertising within Intuitive Technology Partners, Inc. to customers whose behavior indicates that they are interested in a particular subject area.</p>
					<p>Intuitive Technology Partners, Inc. Web sites will disclose your personal information, without notice, only if required to do so by law or in the good faith belief that such action is necessary to: (a) conform to the edicts of the law or comply with legal process served on Intuitive Technology Partners, Inc. or the site; (b) protect and defend the rights or property of Intuitive Technology Partners, Inc.; and, (c) act under exigent circumstances to protect the personal safety of users of Intuitive Technology Partners, Inc., or the public.</p>
				</li>
				<li>
					<h4>Use of Cookies</h4>
					<p>The Intuitive Technology Partners, Inc. Web site use “cookies” to help you personalize your online experience. A cookie is a text file that is placed on your hard disk by a Web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>
					<p>One of the primary purposes of cookies is to provide a convenience feature to save you time. The purpose of a cookie is to tell the Web server that you have returned to a specific page. For example, if you personalize Intuitive Technology Partners, Inc. pages, or register with Intuitive Technology Partners, Inc. site or services, a cookie helps Intuitive Technology Partners, Inc. to recall your specific information on subsequent visits. This simplifies the process of recording your personal information, such as billing addresses, shipping addresses, and so on. When you return to the same Intuitive Technology Partners, Inc. Web site, the information you previously provided can be retrieved, so you can easily use the Intuitive Technology Partners, Inc. features that you customized.</p>
					<p>You have the ability to accept or decline cookies. Most Web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. If you choose to decline cookies, you may not be able to fully experience the interactive features of the Intuitive Technology Partners, Inc. services or Web sites you visit.</p>
				</li>
				<li>
					<h4>Security of your Personal Information</h4>
					<p>Intuitive Technology Partners, Inc. secures your personal information from unauthorized access, use or disclosure. Intuitive Technology Partners, Inc. secures the personally identifiable information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use or disclosure. When personal information (such as a credit card number) is transmitted to other Web sites, it is protected through the use of encryption, such as the Secure Socket Layer (SSL) protocol.</p>
				</li>
				<li>
					<h4>Changes to this Statement</h4>
					<p>Intuitive Technology Partners, Inc. will occasionally update this Statement of Privacy to reflect company and customer feedback. Intuitive Technology Partners, Inc. encourages you to periodically review this Statement to be informed of how Intuitive Technology Partners, Inc. is protecting your information.</p>
				</li>
				<li>
					<h4>Contact Information</h4>
					<p>Intuitive Technology Partners, Inc. welcomes your comments regarding this Statement of Privacy. If you believe that Intuitive Technology Partners, Inc. has not adhered to this Statement, please contact Intuitive Technology Partners, Inc. at info@itp-inc.com. We will use commercially reasonable efforts to promptly determine and remedy the problem.</p>
				</li>
			</ul>
		</div>
	</div>
</section>

</main>

    <!-- /main -->
@endsection
@section('js')
<script>
	$(document).ready(function(){
		// getData();
	})
	function categopost(ids){
		var data = new FormData();
		data.append('id', ids);
		var response = runAjax('{{route("ajax.category.post.list")}}', data); 
		if(response.status == '200'){
			$('#data-list').empty();
			if(response.data.length > 0){
				var htmlData = '';
				$.each(response.data, function( index, value ) {
					//var date = moment.unix(value.timestamp).format("DD-MMMM-YYYY (h:mm a)");
					htmlData+= '<div class="col-lg-6 col-md-6 mb-4"><div class="blog-details"><div class="blog-image"><img src="'+ value.image+'" class="img-fluid" /></div>'+
									'<div class="blog-content"><h4>'+ value.title+'</h4><div class="blogdesc"><p class="mb-4">'+ value.description+'</p></div>'+
									'<a href="/blog/'+ value.id+'">Read More</a></div></div></div>';
								
					})
				$('#data-list').html(htmlData);
			}
		}
	}
	// GET LIST
	// function getData(){
	// 	var data = new FormData();
	// 	data.append('page', $('#filterBox #page').val());
	// 	data.append('count', $('#filterBox #count').val());
	// 	data.append('status', $('input[name="statusRadio"]:checked').val());
	// 	var response = adminAjax('{{route("ajax.category.list")}}', data); 
	// 	if(response.status == '200'){
	// 		$('#data-list').empty();
	// 		if(response.data.length > 0){
	// 			var htmlData = '';
	// 			$.each(response.data, function( index, value ) {
	// 				//var date = moment.unix(value.timestamp).format("DD-MMMM-YYYY (h:mm a)");
	// 				htmlData+= '<tr>'+
	// 								'<th scope="row">'+ value.id +'</th>'+
	// 								'<td><img src="'+ value.image +'" height="50px" width="50px"></td>'+
	// 								'<td>'+ value.title +'</td>'+
	// 								'<td>'+ value.priority +'</td>'+
	// 								'<td>'+ value.status +'</td>'+
	// 								'<td>'+ value.action +'</td>'+
	// 							'</tr>';
	// 			})
	// 			$('#data-list').html(htmlData);
	// 		}
	// 	}
	// }
</script>
@endsection