<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ConversationTopic;

class ChangeNameConversation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $topics = [
                
                [
                    'id' => 5,
                    'name' => 'Onboarding',
                    'when_to_use' => 'Use this template when an employee is new to the BCPS or new to their position. It will help to clarify expectations for the role, provide organizational context, define short-term goals, and set an employee up for success. ',
                    'question_html' => '<ul>
	<li>Do you have a clear understanding of the expectations for this role? </li>
	<li>Have you received access to all of the information, tools, and resources you need to complete your responsibilities? </li>
		<ul>
			<li>What support do you need from me as your supervisor?</li>				
			<li>Are there any specific tools or training sessions that would help you be more successful?</li>
		</ul>
	<li>How well do you understand the Corporate Plan, your ministry’s vision, mission and mandate, etc.?</li>
	<li>Is there anything you would like clarification or support on (i.e. job duties or work policies)?</li>
	<li>What challenges, if any, have you encountered while training or when performing your duties? </li>
		<ul>
			<li>What can we do address those challenges?</li>
		</ul>
	<li>Which aspects of the job are you excited about? </li>
	<li>Which aspects of the job are you worried about?</li>
	<li>What motivates you to get your job done?</li>
	<li>How do you prefer to receive feedback and/or recognition for your work?</li>
	<li>What would be the best use of our one-on-one time?</li>
	<li>How are your relationships with others on the team?</li>
		<ul>
			<li>What would help you feel connected to the rest of the team?</li>
		</ul>
	<li>What specific areas do you intend to work on before we next meet?</li>
	<li>Is there anything else I should know?</li>
</ul>',
                    'preparing_for_conversation' => '<ul>
	<li>Supervisors </li>
		<ul>
			<li>Review resources available on MyHR including:</li>
				<ul>
					<li><a href="https://www2.gov.bc.ca/gov/content/careers-myhr/managers-supervisors/set-up-employee">Setting Up a New Employee</a></li>
					<li><a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/new-employees/when-you-start/first-three-months/oath">New Employee Journey</a></li>
		    		</ul>
			<li>Ensure the employee is aware of their <a href="https://www2.gov.bc.ca/gov/content/careers-myhr/managers-supervisors/set-up-employee#probation">probationary status</a></li>
				<ul>
					<li>Reach out to AskMyHR if there are any suitability concerns, including employee performance and conduct.</li>
				</ul>
			<li>Confirm the employee has been given a copy of their job description and any corporate or organizational plans.</li>
			<li>Come prepared to discuss styles of communication and ways of working to help build a strong and effective relationship moving forward.</li>		
		</ul>
</ul>

<ul>
	<li>Employees </li>
		<ul>
			<li>Review resources available on MyHR including:</li>
				<ul>
					<li><a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/new-employees">New Employee Journey</a></li>
					<li><a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/new-employees/when-you-start/first-three-months#probation">What to Expect During Probation</a></li>
		    		</ul>
			<li>Review your job description, corporate or organizational plans, and other performance expectations that have been communicated to you by your supervisor.</li>
			<li>Create a list of any questions you have for your supervisor about your role, your team, or the organization.</li>	
			<li>Come prepared to discuss styles of communication and ways of working to help build a strong and effective relationship moving forward.</li>		
		</ul>
</ul>',
                ],
            ];
        
            foreach($topics as $topic) {
                ConversationTopic::updateOrCreate([
                    'id' => $topic['id'],
                ], $topic);
            }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}