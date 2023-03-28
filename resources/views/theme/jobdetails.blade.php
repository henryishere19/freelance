@extends('layouts.theme.master')

@section('content')
<main id="main">

<!-- ======= Single Job Description ======= -->
<section id="job_listing" class="job-listing">
  <div class="container">
    <div class="job-listing-contaier">
      <div class="single-job-content">  
        <div class="job-discription">
          <h1 class="job-title">{{$jsndata->title}}</h1>
          <ul>
            @foreach($jsndata->portal->fields as $val)
            <li>{{$val->value}}</li>
            @endforeach
            <!-- <li>Remote</li>
            <li>Contract</li> -->
          </ul>

          <p>{!! $jsndata->description !!}</p>
          <!-- <ul>
            <li><b>Job Title:</b></li>
            <li><b>Start Date:</b> ASAP</li>
            <li><b>Duration:</b> 6 Months + </li>
            <li><b>Location:</b> USA (Remote)</li>
          </ul>

          <h4><b>Who We Are:</b></h4>
          <p>Founded on a vision of providing innovative and competitive solutions to businesses, Intuitive strives to help customers leverage technology to achieve business goals and excel in their core competencies. Intuitive is one of the fastest growing IT companies in America (recognized by CRN & INC5000) solving complex business challenges around Cloud & SDx transformation, leveraging cutting-edge and best-in-breed technology solutions tailored to client needs.</p>
          <p>As a ThoughtSpot Development Consultant in Intuitive, you will work closely with customers to help them build data platforms to power decision making and analytics for their businesses. You will work on building new scalable data solutions or modernizing existing data lakes using modern and evolving cloud storage platforms. In this role, you will build scalable, flexible, and customized solutions for our customers. You will work with our customers from ideation to production and deploy solutions, deliver workshops, educate, and empower customers. You will be working closely with SMEs in Data Engineering and cloud DataOps, to create novel solutions and extend Intuitive's DataOps capabilities. You will be responsible for building architectures, DataOps methodologies, and lead the development and deployment into the Intuitive solutions delivery team [ISDT] and bring it to production in real customer deployments.<br>We are committed to bringing quality services to our clients, with our exceptional and experienced solution-focused and customer-oriented thinkers.</p>

          <h4>What You Will Do:</h4>
          <ul>
            <li>Consult with key executive stakeholders to identify business requirements and perform design reviews to ensure business needs are met.</li>
            <li>Develop scalable ThoughtSpot solutions, including data modeling, ETL, and visualizations to support business processes and system solutions.</li>
            <li>Optimize ThoughtSpot performance by tuning data models, queries, and dashboards.</li>
            <li>Work with data engineers and administrators to ensure data quality, security, and governance.</li>
            <li>Train and support business users on how to use ThoughtSpot effectively.</li>
            <li>Utilize Business Intelligence tools to build and support dashboards.</li>
            <li>Manage and resolve client issue escalation and systemic improvements.</li>
            <li>On-board end-to-end datasets to the data lake and relevant access provisioning</li>
            <li>Connect applications to the data lake for data consumption.</li>
            <li>Consult with business stakeholders and translate their requirements.</li>
          </ul>

          <h4>What We are Looking For:</h4>
          <ul>
            <li>Bachelor's degree in Computer Science, Information Systems, or related field.</li>
            <li>3+ years of experience in data modeling, ETL, and BI development.</li>
            <li>2+ years of experience with ThoughtSpot or other modern BI tools.</li>
            <li>Should have broad understanding of AI/ML based reporting solutions</li>
            <li>Comfortable with using SearchIQ and SpotIQ efficiently</li>
            <li>Knowledge of programming languages like SQL, and Python</li>
            <li>Familiarity with either one of AWS, Azure and GCP platforms</li>
            <li>Advanced ability to deploy modern data lake, Data Lake House, Data Mesh topologies</li>
            <li>Experience with cloud and commercial Data Lake platforms</li>
            <li>Strong SQL skills and experience working with relational databases.</li>
            <li>Experience with data visualization best practices and techniques.</li>
            <li>Excellent problem-solving, communication, and teamwork skills</li> -->
          <!-- </ul> -->

          <div class="apply-now-button">
            <a href="{{$jsndata->links->ui->applications}}" target="_blank">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ======= End Single Job Description ======= -->

<div class="modal fade" id="jobapply" tabindex="-1" aria-labelledby="jobapplyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jobapplyLabel">Submit Your Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="apply-now-form" action="">
          <div class="form-field">
            <input type="text" name="name" id="name" placeholder="Full Name" class="form-control">
          </div>
          <div class="form-field">
            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
          </div>
          <div class="form-field">
            <input type="text" name="number" id="number" placeholder="Phone" class="form-control">
          </div>
          <div class="form-field">
            <input type="text" name="company" id="company" placeholder="Current Company" class="form-control">
          </div>
          <div class="form-field">
            <div class="input-group custom-file-button">
              <label class="input-group-text" for="inputGroupFile"><i class="fa fa-paperclip" aria-hidden="true"></i></label>
              <input type="file" class="form-control" id="inputGroupFile">
            </div>
          </div>
          <div class="form-field">
            <textarea rows="4" cols="50" name="message" id="message" placeholder="Message" class="form-control"></textarea>
          </div>
          <div class="form-field">
            <div class="apply-now-button">
              <a href="job-apply-button">Apply Now</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</main>
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
									'<div class="blog-content"><h4>'+ value.title+'</h4><p class="mb-4">'+ value.description+'</p>'+
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