<?php

namespace Database\Seeders;

use App\Models\ConversationTopic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'id' => 1,
                'name' => 'Performance Check-In',
                'when_to_use' => 'Use this template when performance expectations are generally being met for a given role and you want to discuss progress against goals, challenges, successes, and how to improve ways of working and future performance outcomes.',
                'preparing_for_conversation' => '<ul>
                    <li>Supervisors should come prepared with feedback that is:</li>
                    <ul>
                    <li>Specific</li>
                    <li>Supported by examples</li>
                    <li>Focused on behaviours, not individuals</li>
                    <li>Focused on future improvements, not past mistakes</li>
                    </ul>
                    </ul>
                    <ul>
                    <li>Supervisors should try to incorporate three types of performance feedback:</li>
                    <ul>
                    <li>Evaluation &ndash; how is your employee doing?</li>
                    <li>Appreciation &ndash; what is your employee doing really well?</li>
                    <li>Coaching &ndash; how can your employee do even better?</li>
                    </ul>
                    </ul>
                    <ul>
                    <li>Employees should consider:</li>
                    <ul>
                    <li>Areas you have excelled at, or projects you&rsquo;ve been involved in that have been great successes</li>
                    <li>Skills and competencies that have led to your greatest results</li>
                    <li>Areas you feel you could improve and what would help you improve</li>
                    <li>Things that got in the way that will be important to address moving forward</li>
                    </ul>
                    </ul>
                    <p>Check out the <a target="_blank" href="https://www2.gov.bc.ca/assets/gov/careers/all-employees/career-development/myperformance/myperformance_conversations.pdf">MyPerformance Guide to Performance Conversations</a> for more tips.</p>',
                'question_html' => '<ul>
                    <li>Overall, how would you describe your work since our last check-in?</li>
                    <li>What progress have you made against your goals?</li>
                    <li>Have your goals shifted?Tell me about that.</li>
                    <li>What accomplishments are you most proud of?</li>
                    <li>How do you think your role helps the work unit succeed?</li>
                    <li>What challenges have you faced? Did you learn anything?</li>
                    <ul>
                    <li>Is there anything that our team or organization could learn from that you would be open to sharing?</li>
                    </ul>
                    <li>What support do you need from me as your supervisor to perform at your best?</li>
                    <ul>
                    <li>What do I do that is most/least helpful for you when it comes to completing your work?</li>
                    </ul>
                    <li>In what areas do you need or want to improve? What would help you improve?</li>
                    <ul>
                    <li>Are there specific skills or competencies we should focus on moving forward?</li>
                    </ul>
                    <li>What motivates you to get your job done?</li>
                    <li>Which job responsibilities/tasks do you enjoy most? Which do you least enjoy?</li>
                    <li>Are you finding anything difficult or stressful?</li>
                    <li>What opportunities are you looking for moving forward?</li>
                    <ul>
                    <li>Do you have any interests or skills we could consider integrating into your work?</li>
                    </ul>
                    <li>How do you prefer to receive feedback and/or recognition for your work?</li>
                    <li>What (if any) concerns do you have when it comes to giving me feedback? How can I alleviate those concerns?</li>
                    </ul>'                    
            ],
            [
                'id' => 2,
                'name' => 'Goal Setting',
                'when_to_use' => 'Use this template when establishing initial goals or revising existing goals in response to shifting or new priorities in the organization. It will help to align individual goals with organizational strategies and create connections to individual strengths and opportunities for growth.',
                'preparing_for_conversation' => '<p>Supervisors should provide copies of relevant corporate plans, organizational plans, and job profiles to the employee to help focus discussions. Goals can focus on business results (what we accomplish) and/or behavioural competencies (how we accomplish things).</p>
                    <p>Goals can be suggested or mandated for employees through the Goal Bank in this platform as a way to provide common language and a starting point for customization.</p>',
                'question_html' => '<ul>
                    <li>I&rsquo;ve shared our team goals and my priorities. What action items can you add to your plan to help achieve these goals?</li>
                    <li>Imagine what success will look like: this can inform your personal performance measures (remember to pick results that are within your control and/or influence).</li>
                    <li>What competencies and values will you focus on to achieve your goals?</li>
                    <li>What do you need to learn to achieve your goals? Do you have any gaps that you want to address?</li>
                    <li>What are the barriers to your success? How will you overcome them?</li>
                    <li>What within your position are you most interested in or passionate about?</li>
                    <li>What strengths do you have that you want to use more of? (Think about what you do effortlessly. What are you doing when you are at your best?)</li>
                    <li>What are your greatest growth opportunities?</li>
                    <li>What personal goals would you like to include in your profile?</li>
                    <ul>
                    <li>How do your personal goals align with our team goas or those of the organization?</li>
                    </ul>
                    <li>What are your career aspirations?</li>
                    <ul>
                    <li>What do you think you need to learn and/or achieve to get there?</li>
                    </ul>
                    <li>What support do you need to meet your goals?</li>
                    </ul>'
            ],
            [
                'id' => 3,
                'name' => 'Career Development',
                'when_to_use' => 'Use this template when you want to focus on mid- and long-term goals and career development for an individual. It will help define potential paths forward and focus on specific steps and supports to assist with reaching career aspirations.',
                'preparing_for_conversation' => 'TBD',
                'question_html' => '<ul>
                    <li>What are your career goals?</li>
                    <ul>
                    <li>What do you think you need to get there?</li>
                    </ul>
                    <li>Do you have specific goals you&rsquo;d like to achieve in the next year, two years, longer?</li>
                    <li>Are you interested in exploring other positions or opportunities within the BCPS?</li>
                    <ul>
                    <li>What do you want your next position to be?</li>
                    </ul>
                    <li>How do you see your career in the BCPS developing?</li>
                    <li>How would you define &ldquo;success&rdquo; for your career?</li>
                    <li>What positive impact do you want your career to have on the Public Service (both short term and long term)?</li>
                    <li>In what areas do you want to grow?</li>
                    <ul>
                    <li>What can I and/or the organization do to help support this growth?</li>
                    </ul>
                    <li>What is one thing I can do to support your career development?</li>
                    <li>What is one thing you can do to support your own career development?</li>
                </ul>'
            ],
            [
                'id' => 4,
                'name' => 'Performance Improvement',
                'when_to_use' => 'Use this template when performance expectations are not being met for a given role. It will help define required performance improvements, support to be provided, timelines, and next steps. Before engaging in this conversation, a supervisor should consider:
                    <ul>
                        <li>What are the expectations for the position? Are they consistent with the employee’s classification, job description, and work done by other employees in similar roles? Has a copy of the job description been provided to the employee?</li>
                        <li>Have the expectations been clearly articulated? How have they been articulated (i.e. goals in MyPerformance, a letter of expectations)? Does the employee understand them? </li>
                    </ul>
                    Supervisors should reach out to an HR Specialist through MyHR if they need additional support having this conversation and/or if performance improvements are not made within agreed upon timelines.',
                'preparing_for_conversation' => '<p>Before engaging in this conversation, a supervisor should consider:</p>
                    <ul>
                    <li>What are the expectations for the position? Are they consistent with the employee&rsquo;s classification, job description, and work done by other employees in similar roles? Has a copy of the job description been provided to the employee?</li>
                    <li>Have the expectations been clearly articulated? How have they been articulated (i.e. goals in MyPerformance, a letter of expectations)? Does the employee understand them?</li>
                    </ul>
                    <p>Supervisors should reach out to an HR Specialist through MyHR if they need additional support having this conversation and/or if performance improvements are not made within agreed upon timelines.</p>',
                'question_html' => '<ul>
                    <li>Tell me about how things have been going for you in your role.</li>
                    <ul>
                    <li>What is going well?</li>
                    <li>Where do you see opportunities for improvement?</li>
                    </ul>
                    <li>Supervisor: Verbally summarize the high-level performance expectations you&rsquo;ve identified in the performance profile as requiring further development.</li>
                    <ul>
                    <li>You can also Identify areas the employee is doing well.</li>
                    </ul>
                    <li>To meet these expectations, what support do you need?</li>
                    <ul>
                    <li>This could be coaching, tools, resources, additional training, etc.</li>
                    </ul>
                    <li>Between now and our next conversation, I would like you to work on 2-3 areas we&rsquo;ve discussed as requiring development. What specific steps will you take to meet these expectations?</li>
                    <li>We will follow up on these areas and discuss your progress during our next meeting. If needed, we can discuss an action plan for improvement in each of those areas when we meet again.</li>
                    <li>Is there anything else you would like to share with me or any other reasonable support that I can offer?</li>
                </ul>'

            ],
            [
                'id' => 5,
                'name' => 'Recognition',
                'when_to_use' => '<p>Use this template to recognize performance achievements, goal accomplishments, and other milestones by individuals or teams. It will help to focus conversation on specific, timely, and meaningful recognition that helps increase employee engagement and performance.</p>
                    <p>If an achievement is truly exceptional or significant, consider putting forward the individual or team for a more formal, public recognition program such as the Premier&rsquo;s Awards. More information on recognition options can be found <a target="_blank" href="https://www2.gov.bc.ca/gov/content/careers-myhr/about-the-bc-public-service/engagement-recognition">here</a>.</p>',
                'preparing_for_conversation' => '<p>Supervisors should take time in advance to consider:</p>
                    <ul>
                    <li>What is being celebrated</li>
                    <li>The impact it had</li>
                    <li>How it made the supervisor/colleague/client feel</li>
                    <li>How the success can be learned from and replicated in the future</li>
                    </ul>',
                'question_html' => '<ul>
                    <li>Supervisors: provide a verbal overview of the actions or results being celebrated. Be as specific as possible about timing, activities, and outcomes achieved. Highlight behaviours, competencies, and corporate values that you feel contributed to the success. Connect the work to the goals and/or values of the organization.</li>
                    <li>What aspect of this accomplishment are you most proud of?</li>
                    <li>What challenges did you face? Did you learn anything? Is there anything that our team or organization could learn from that you would be open to sharing?</li>
                    <li>Who else contributed to your success?</li>
                    <li>How would you like to celebrate success? Do you prefer one-on-one discussions or would you like more public or team-oriented recognition?</li>
                    </ul>'
            ],
                 [
                'id' => 6,
                'name' => 'Onboarding',
                'when_to_use' => '<p>Use this template when an employee is new to the BCPS or new to their position. It will help to clarify expectations for the role, provide organizational context, define short-term goals, and set an employee up for success.</p>
                    <p>If there are any suitability concerns, including performance and conduct, reach out to AskMyHR immediately. The onus to demonstrate suitability is on the employee. Managing the probationary period is intended to be supportive, but should concerns persist, significant processes and documentation is required prior to 913 hours.</p>',
                'preparing_for_conversation' => '<p>In the probationary period, supervisors are required to advise the employee of their probationary status.i.e. As you have started a new role, you are subject to a probationary period. The probationary period is equivalent to 6 months of full-time work and consists of 913 hours. The purpose of the probationary period is to provide you with a trial period to demonstrate your suitability for the role. To ensure that we are openly communicating during this time, I have scheduled meetings for us every [time period]. Do you have any questions about the probationary period?</p>
                    <p>Supervisors must also establish standards of work and performance to the employee and provide proper supervision.The Employer must identify the specific duties of the position and the standards against which the employee will be measured. This is normally done by providing a copy of the relevant job description, corporate or organizational plans, and discussing expected measures and standards to be met including what constitutes satisfactory performance.</p>
                    <ul>
                    <li>Note: A letter of expectations should be provided to new hires to articulate these expectations. MyHR has sample documents or contact AskMyHR for assistance.</li>
                    </ul>
                    <p>Supervisors should review resources available on MyHR including:</p>
                    <ul>
                    <li><a target="_blank" href="https://www2.gov.bc.ca/gov/content/careers-myhr/managers-supervisors/set-up-employee">Setting Up a New Employee</a></li>
                    <li><a target="_blank" href="https://www2.gov.bc.ca/assets/gov/careers/managers-supervisors/set-up-a-new-employee/bcps_supervisor_checklist.pdf">Corporate Onboarding Supervisor Checklist</a></li>
                    </ul>',
                'question_html' => '<ul>
                    <li>Do you have a clear understanding of the expectations for this role?</li>
                    <ul>
                    <li>Is there anything you would like clarification or support on (i.e. job duties or work policies)?</li>
                    </ul>
                    <li>How well do you understand the Corporate Plan, your ministry&rsquo;s vision, mission and mandate etc.?</li>
                    <li>Have you received access to all of the information, tools, and resources you need to complete your responsibilities?</li>
                    <ul>
                    <li>Are there any specific tools or training sessions that would help you be more successful?</li>
                    <li>What supports do you need from me as your supervisor?</li>
                    </ul>
                    <li>How are your relationships with others on the team?</li>
                    <ul>
                    <li>What would help you feel connected to the rest of the team?</li>
                    </ul>
                    <li>What challenges, if any, have you encountered while training or when performing your duties?</li>
                    <li>What would you like to accomplish in the next 30 days? 60 days? 90 days?</li>
                    <li>How do you prefer to receive feedback and/or recognition for your work?</li>
                    <li>What would be the best use of our one-on-one time?</li>
                    <li>What area of the organization would you like to learn more about?</li>
                    <li>Which aspects of the job are you excited about? Which are you worried about?</li>
                    <li>Do you have any expertise or experience that you think could be better utilized?</li>
                    <li>Is there anything else I should know?</li>
                    </ul>'
            ],

        ];

        foreach ($list as $l) {
            ConversationTopic::updateOrCreate([
                'id' => $l['id'],
            ], $l);
        }
    }
}
