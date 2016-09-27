 <form method="get" class="course-searchform" id="course-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <h3><?php _e( 'Course Search', 'textdomain' ); ?></h3>

    <label for="s">Filter by Keyword: 
    <input type="text" name="s" placeholder="Search courses"/> </label>
    <label>
    Delivery Option:
    <select name="delivery">
   		<option value=""><?php _e( 'All courses', 'textdomain' ); ?></option>
        <option value="Online"><?php _e( 'Online', 'textdomain' ); ?></option>
        <option value="Classroom"><?php _e( 'Classroom', 'textdomain' ); ?></option>
    </select>
    </label>

<label>
    Location:
    <select name="location">
   		<option value=""><?php _e( 'All Locations', 'textdomain' ); ?></option>
        <option value="apex"><?php _e( 'Apex', 'textdomain' ); ?></option>
        <option value="asheville"><?php _e( 'Asheville', 'textdomain' ); ?></option>
        <option value="burlington"><?php _e( 'Burlington', 'textdomain' ); ?></option>
        <option value="cary"><?php _e( 'Cary', 'textdomain' ); ?></option>
        <option value="chapel-hill"><?php _e( 'Chapel Hill', 'textdomain' ); ?></option>
        <option value="charleston"><?php _e( 'Charleston SC', 'textdomain' ); ?></option>
        <option value="charlotte"><?php _e( 'Charlotte', 'textdomain' ); ?></option>
        <option value="concord"><?php _e( 'Concord', 'textdomain' ); ?></option>
        <option value="durham"><?php _e( 'Durham', 'textdomain' ); ?></option>
        <option value="eastern"><?php _e( 'Eastern NC', 'textdomain' ); ?></option>
        <option value="edenton"><?php _e( 'Edenton', 'textdomain' ); ?></option>
        <option value="fayetteville"><?php _e( 'Fayetteville', 'textdomain' ); ?></option>
        <option value="gastonia"><?php _e( 'Gastonia', 'textdomain' ); ?></option>
        <option value="georgia"><?php _e( 'Georgia', 'textdomain' ); ?></option>
        <option value="greensboro"><?php _e( 'Greensboro', 'textdomain' ); ?></option>
        <option value="greenville"><?php _e( 'Greenville NC', 'textdomain' ); ?></option>
        <option value="greenville-sc"><?php _e( 'Greenville SC', 'textdomain' ); ?></option>
        <option value="havelock"><?php _e( 'Havelock', 'textdomain' ); ?></option>
        <option value="hendersonville"><?php _e( 'Hendersonville', 'textdomain' ); ?></option>
        <option value="hickory"><?php _e( 'Hickory', 'textdomain' ); ?></option>
        <option value="high-point"><?php _e( 'High Point', 'textdomain' ); ?></option>
        <option value="irmo"><?php _e( 'Irmo (Columbia) SC', 'textdomain' ); ?></option>
        <option value="jacksonville"><?php _e( 'Jacksonville', 'textdomain' ); ?></option>
        <option value="kannapolis"><?php _e( 'Kannapolis', 'textdomain' ); ?></option>
        <option value="kinston"><?php _e( 'Kinston', 'textdomain' ); ?></option>
        <option value="knoxville"><?php _e( 'Knoxville TN', 'textdomain' ); ?></option>
        <option value="lumberton"><?php _e( 'Lumberton', 'textdomain' ); ?></option>
        <option value="mooresville"><?php _e( 'Mooresville', 'textdomain' ); ?></option>
        <option value="morrisville"><?php _e( 'Morrisville', 'textdomain' ); ?></option>
        <option value="nashville"><?php _e( 'Nashville TN', 'textdomain' ); ?></option>
        <option value="new-bern"><?php _e( 'New Bern', 'textdomain' ); ?></option>
        <option value="newton"><?php _e( 'Newton', 'textdomain' ); ?></option>
        <option value="northeast"><?php _e( 'Northeast NC', 'textdomain' ); ?></option>
        <option value="piedmont-triad"><?php _e( 'Piedmont Triad', 'textdomain' ); ?></option>
        <option value="polkton"><?php _e( 'Polkton', 'textdomain' ); ?></option>
        <option value="raleigh"><?php _e( 'Raleigh', 'textdomain' ); ?></option>
        <option value="research-triangle"><?php _e( 'Research Triangle', 'textdomain' ); ?></option>
        <option value="rocky-mount"><?php _e( 'Rocky Mount', 'textdomain' ); ?></option>
        <option value="salisbury"><?php _e( 'Salisbury', 'textdomain' ); ?></option>
        <option value="sanford"><?php _e( 'Sanford', 'textdomain' ); ?></option>
        <option value="savannah"><?php _e( 'Savannah GA', 'textdomain' ); ?></option>
        <option value="south-carolina"><?php _e( 'South Carolina', 'textdomain' ); ?></option>
        <option value="southport"><?php _e( 'Southport', 'textdomain' ); ?></option>
        <option value="statesville"><?php _e( 'Statesville', 'textdomain' ); ?></option>
        <option value="surfside-beach"><?php _e( 'Surfside Beach (Myrtle Beach) SC', 'textdomain' ); ?></option>
        <option value="tennessee"><?php _e( 'Tennessee', 'textdomain' ); ?></option>
        <option value="waynesville"><?php _e( 'Waynesville', 'textdomain' ); ?></option>
        <option value="western"><?php _e( 'Western NC', 'textdomain' ); ?></option>
        <option value="wilmington"><?php _e( 'Wilmington', 'textdomain' ); ?></option>
        <option value="wilson"><?php _e( 'Wilson', 'textdomain' ); ?></option>
        <option value="winston-salem"><?php _e( 'Winston-Salem', 'textdomain' ); ?></option>    
    </select>
    </label>
<?php /*     <label>
    Topic tag:
    <select name="tag">
        <option value=""><?php _e( 'All Topics', 'textdomain' ); ?></option>
        <option value="Raleigh"><?php _e( 'Raleigh', 'textdomain' ); ?></option>
        <option value="Charlotte"><?php _e( 'Charlotte', 'textdomain' ); ?></option>
    </select>
    </label>

     */ ?>
     <input type="hidden" name="post_type" value="courses" /> <!-- // hidden post type value -->
    <input type="submit" alt="Search" value="Search" id="srchbut"/>
</form>