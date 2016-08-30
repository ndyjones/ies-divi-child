<?php
/*
Template Name: SF Contact Form Page
*/

get_header(); ?>

  <script type="text/javascript">

//validate phone
function validatePhone(phone){
    var re = /^(1?)(-| ?)(\()?((?:[0-9]-?){3})(\)|-| |\)-|\) )?((?:[0-9]-?){3})(-| )?((?:[0-9]-?){4}|(?:[0-9]-?){4})$/;
    if(re.test(phone))
    {
    	document.getElementById('phone').style.background ='#ccffcc';
    	document.getElementById('phoneError').style.display = "none";
        return true;
    }else{
    	document.getElementById('phone').style.background ='#e35152';
    	document.getElementById('phoneError').style.display = "block";
    return false;
    }
}

// Validate email
function validateEmail(email){ 
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if(re.test(email)){
    document.getElementById('email').style.background ='#ccffcc';
    document.getElementById('emailError').style.display = "none";
    return true;
  }else{
    document.getElementById('email').style.background ='#e35152';
    document.getElementById('emailError').style.display = "block";
    return false;
  }
}

function validateForm(){
	// Set error catcher
	var error = 0;

	// Validate email
	if(!validateEmail(document.getElementById('email').value)){
	  document.getElementById('emailError').style.display = "block";
	  error++;
	}
	// Validate phone
	if(!validatePhone(document.getElementById('phone').value)){
	  document.getElementById('phoneError').style.display = "block";
	  error++;
	}
	// Don't submit form if there are errors
	if(error > 0){
	  return false;
	}

}
</script>

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">


			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<h1 class="main_title"><?php the_title(); ?></h1>
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>

					<div class="entry-content">
					
					<?php the_content(); ?>

					<p>Tell us what you need! Please fill out the form fields below and we'll be in touch.</p>
							<div class="IES-contactForm" style="margin-bottom: 45px;">
							<div class="form-block"><form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" onsubmit="return validateForm()" method="POST"><input id="lead_source" name="lead_source" type="hidden" value="Web" /><input name="oid" type="hidden" value="00D1a000000J8a3" /><input name="retURL" type="hidden" value="https://www.ies.ncsu.edu/thanks/" />
							<div class="form-item"><label for="first_name">First Name</label><input id="first_name" maxlength="40" name="first_name" required="yes" size="20" type="text" /></div>
							<div class="form-item"><label for="last_name">Last Name</label><input id="last_name" maxlength="80" name="last_name" required="" size="20" type="text" /></div>
							<div class="form-item"><label for="email">Email</label><input id="email" maxlength="80" name="email" required="" size="20" type="text" onblur="validateEmail(value)" /></div>
							<span id="emailError" style="font-size: 16px;text-align: center;color: red;display: none;">Please enter a valid email address.</span>
							<div class="form-item"><label for="phone">Phone</label><input id="phone" maxlength="25" name="phone" size="20" type="text" onblur="validatePhone(value)" /></div>
							<span id="phoneError" style="font-size: 16px;text-align: center;color: red;display: none;">You have entered an invalid phone number. Please enter a 10-digit number in the format ###-###-####.</span>
							<div class="form-item"><label for="company">Company</label><input id="company" title="Must contain at least three or more characters" maxlength="40" name="company" pattern="[a-zA-Z0-9]+[a-zA-Z0-9 ]+{3,}" required="" size="20" type="text" /></div>
							<div class="form-item"><label for="county">County</label><select id="00N1a000005x0eW" title="County" name="00N1a000005x0eW">
							<option value="Out of State">Out of State</option>
							<option value="Alamance County">Alamance County</option>
							<option value="Alexander County">Alexander County</option>
							<option value="Alleghany County">Alleghany County</option>
							<option value="Anson County">Anson County</option>
							<option value="Ashe County">Ashe County</option>
							<option value="Avery County">Avery County</option>
							<option value="Beaufort County">Beaufort County</option>
							<option value="Bertie County">Bertie County</option>
							<option value="Bladen County">Bladen County</option>
							<option value="Brunswick County">Brunswick County</option>
							<option value="Buncombe County">Buncombe County</option>
							<option value="Burke County">Burke County</option>
							<option value="Cabarrus County">Cabarrus County</option>
							<option value="Caldwell County">Caldwell County</option>
							<option value="Camden County">Camden County</option>
							<option value="Carteret County">Carteret County</option>
							<option value="Caswell County">Caswell County</option>
							<option value="Catawba County">Catawba County</option>
							<option value="Chatham County">Chatham County</option>
							<option value="Cherokee County">Cherokee County</option>
							<option value="Chowan County">Chowan County</option>
							<option value="Clay County">Clay County</option>
							<option value="Cleveland County">Cleveland County</option>
							<option value="Columbus County">Columbus County</option>
							<option value="Craven County">Craven County</option>
							<option value="Cumberland County">Cumberland County</option>
							<option value="Currituck County">Currituck County</option>
							<option value="Dare County">Dare County</option>
							<option value="Davidson County">Davidson County</option>
							<option value="Davie County">Davie County</option>
							<option value="Duplin County">Duplin County</option>
							<option value="Durham County">Durham County</option>
							<option value="Edgecombe County">Edgecombe County</option>
							<option value="Forsyth County">Forsyth County</option>
							<option value="Franklin County">Franklin County</option>
							<option value="Gaston County">Gaston County</option>
							<option value="Gates County">Gates County</option>
							<option value="Graham County">Graham County</option>
							<option value="Granville County">Granville County</option>
							<option value="Greene County">Greene County</option>
							<option value="Guilford County">Guilford County</option>
							<option value="Halifax County">Halifax County</option>
							<option value="Harnett County">Harnett County</option>
							<option value="Haywood County">Haywood County</option>
							<option value="Henderson County">Henderson County</option>
							<option value="Hertford County">Hertford County</option>
							<option value="Hoke County">Hoke County</option>
							<option value="Hyde County">Hyde County</option>
							<option value="Iredell County">Iredell County</option>
							<option value="Jackson County">Jackson County</option>
							<option value="Johnston County">Johnston County</option>
							<option value="Jones County">Jones County</option>
							<option value="Lee County">Lee County</option>
							<option value="Lenoir County">Lenoir County</option>
							<option value="Lincoln County">Lincoln County</option>
							<option value="Macon County">Macon County</option>
							<option value="Madison County">Madison County</option>
							<option value="Martin County">Martin County</option>
							<option value="McDowell County">McDowell County</option>
							<option value="Mecklenburg County">Mecklenburg County</option>
							<option value="Mitchell County">Mitchell County</option>
							<option value="Montgomery County">Montgomery County</option>
							<option value="Moore County">Moore County</option>
							<option value="Nash County">Nash County</option>
							<option value="New Hanover County">New Hanover County</option>
							<option value="Northampton County">Northampton County</option>
							<option value="Onslow County">Onslow County</option>
							<option value="Orange County">Orange County</option>
							<option value="Pamlico County">Pamlico County</option>
							<option value="Pasquotank County">Pasquotank County</option>
							<option value="Pender County">Pender County</option>
							<option value="Perquimans County">Perquimans County</option>
							<option value="Person County">Person County</option>
							<option value="Pitt County">Pitt County</option>
							<option value="Polk County">Polk County</option>
							<option value="Randolph County">Randolph County</option>
							<option value="Richmond County">Richmond County</option>
							<option value="Robeson County">Robeson County</option>
							<option value="Rockingham County">Rockingham County</option>
							<option value="Rowan County">Rowan County</option>
							<option value="Rutherford County">Rutherford County</option>
							<option value="Sampson County">Sampson County</option>
							<option value="Scotland County">Scotland County</option>
							<option value="Stanly County">Stanly County</option>
							<option value="Stokes County">Stokes County</option>
							<option value="Surry County">Surry County</option>
							<option value="Swain County">Swain County</option>
							<option value="Transylvania County">Transylvania County</option>
							<option value="Tyrrell County">Tyrrell County</option>
							<option value="Union County">Union County</option>
							<option value="Vance County">Vance County</option>
							<option value="Wake County">Wake County</option>
							<option value="Warren County">Warren County</option>
							<option value="Washington County">Washington County</option>
							<option value="Watauga County">Watauga County</option>
							<option value="Wayne County">Wayne County</option>
							<option value="Wilkes County">Wilkes County</option>
							<option value="Wilson County">Wilson County</option>
							<option value="Yadkin County">Yadkin County</option>
							<option value="Yancey County">Yancey County</option>
							</select></div>
							<div class="form-item"><label for="interest">What services are you interested in?</label><select id="00N1a000006crYx" title="Interests" multiple="multiple" name="00N1a000006crYx">
							<option value="AS 9100">AS 9100</option>
							<option value="Baldrige">Baldrige</option>
							<option value="Business Growth">Business Growth</option>
							<option value="E-learning">E-learning</option>
							<option value="Environmental/Sustainability">Environmental/Sustainability</option>
							<option value="Evaluation and Assessment">Evaluation and Assessment</option>
							<option value="Grant Services">Grant Services</option>
							<option value="Hazardous Waste Mgmt">Hazardous Waste Mgmt</option>
							<option value="Industrial Engineering">Industrial Engineering</option>
							<option value="Instructional Design">Instructional Design</option>
							<option value="ISO 13485/21 CFR 820">ISO 13485/21 CFR 820</option>
							<option value="ISO 14001">ISO 14001</option>
							<option value="ISO 9001">ISO 9001</option>
							<option value="Lean">Lean</option>
							<option value="Lean Healthcare">Lean Healthcare</option>
							<option value="MESH">MESH</option>
							<option value="MMIR Network">MMIR Network</option>
							<option value="OHSAS 18001">OHSAS 18001</option>
							<option value="Organizational strategy">Organizational strategy</option>
							<option value="OSHA Training Institute">OSHA Training Institute</option>
							<option value="Project Management">Project Management</option>
							<option value="Proposal Writing &amp; Development">Proposal Writing &amp; Development</option>
							<option value="Safety">Safety</option>
							<option value="Shinto Prize">Shinto Prize</option>
							<option value="Six Sigma">Six Sigma</option>
							<option value="TS 16949">TS 16949</option>
							</select></div>
							<div class="form-item"><label for="description">Comments</label><textarea name="description"></textarea></div>
							<div class="form-item"><label for="subscribe">Subscribe to IES Updates?</label><input id="00N1a000005ws9Y" name="00N1a000005ws9Y" size="10" type="checkbox" value="0" /></div>
							<div class="form-item"><input name="submit" type="submit" /></div>
							</form></div>
							</div>
					
					</div> <!-- .entry-content -->

				
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>

