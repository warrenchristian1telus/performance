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
                'when_to_use' => 'Use this template when performance expectations are generally being met for a given role and you want to discuss progress against goals, challenges, successes, and how to improve ways of working and future performance outcomes.'
            ],
            [
                'id' => 2,
                'name' => 'Goal Setting',
                 'when_to_use' => 'Use this template when establishing initial goals or revising existing goals in response to shifting or new priorities in the organization. It will help to align individual goals with organizational strategies and create connections to individual strengths and opportunities for growth.'
            ],
            [
                'id' => 3,
                'name' => 'Career Development',
                 'when_to_use' => 'Use this template when you want to focus on mid- and long-term goals and career development for an individual. It will help define potential paths forward and focus on specific steps and supports to assist with reaching career aspirations.'
            ],
            [
                'id' => 4,
                'name' => 'Performance Improvement',
                'when_to_use' => 'Use this template when performance expectations are not being met for a given role. It will help define required performance improvements, support to be provided, timelines, and next steps. Before engaging in this conversation, a supervisor should consider:
                    <ul>
    <li>What are the expectations for the position? Are they consistent with the employee’s classification, job description, and work done by other employees in similar roles? Has a copy of the job description been provided to the employee?</li>
    <li>Have the expectations been clearly articulated? How have they been articulated (i.e. goals in MyPerformance, a letter of expectations)? Does the employee understand them? </li>
    </ul>
Supervisors should reach out to an HR Specialist through MyHR if they need additional support having this conversation and/or if performance improvements are not made within agreed upon timelines.'
            ],
            [
                'id' => 5,
                'name' => 'Recognition',
                'when_to_use' => 'Use this template to recognize performance achievements, goal accomplishments, and other milestones by individuals or teams. It will help to focus conversation on specific, timely, and meaningful recognition that helps increase employee engagement and performance. 

If an achievement is truly exceptional or significant, consider putting forward the individual or team for a more formal, public recognition program such as the Premier’s Awards. More information on recognition options can be found here.'
            ],
                 [
                'id' => 6,
                'name' => 'Onboarding',
                'when_to_use' => 'Use this template when an employee is new to the BCPS or new to their position. It will help to clarify expectations for the role, provide organizational context, define short-term goals, and set an employee up for success. '
            ],
                 [
                'id' => 7,
                'name' => 'End of Probation',
                'when_to_use' => '<p>Use this template at the end of an employee’s probation period to discuss accomplishments and challenges, confirm that an employee is meeting expectations, and ensure that an employee is set up for future success.
</p>
<p>The probation period is a six-month period of full-time employment, which is equal to 913 hours paid at straight time, for new employees (or employees transferring to a position with different responsibilities) to adjust to their job and demonstrate their ability to perform the work. Part-time employees that would take longer than 12 months to work 913 hours have a probation period that is 12 months from their appointment date. A supervisor or manager can submit an <a href="https://logon7.gov.bc.ca/clp-cgi/int/logon.cgi?flags=1000:1,0&TARGET=$SM$HTTPS%3a%2f%2fsfs7%2egov%2ebc%2eca%2faffwebservices%2fredirectjsp%2fcustomerportal%2fredirect%2ejsp%3fSPID%3durn%3aca%3abc%3agov%3acustomerportal%3aprod%26SMPORTALURL%3dhttps$%3A$%2F$%2Fsfs7%2egov%2ebc%2eca$%2Faffwebservices$%2Fpublic$%2Fsaml2sso%26SAMLTRANSACTIONID%3d4f062638-d1bc5f7a-750e7c19-e936885c-3d4fd2d6-c3" target="_blank">AskMyHR</a> request for help confirming hours towards probation completion: My Team or Organization > Employee & Labour Relations > Managing Probation.
</p>
Submit a letter once a new employee\'s probation is complete through <a href="https://logon7.gov.bc.ca/clp-cgi/int/logon.cgi?flags=1000:1,0&TARGET=$SM$HTTPS%3a%2f%2fsfs7%2egov%2ebc%2eca%2faffwebservices%2fredirectjsp%2fcustomerportal%2fredirect%2ejsp%3fSPID%3durn%3aca%3abc%3agov%3acustomerportal%3aprod%26SMPORTALURL%3dhttps$%3A$%2F$%2Fsfs7%2egov%2ebc%2eca$%2Faffwebservices$%2Fpublic$%2Fsaml2sso%26SAMLTRANSACTIONID%3d4f062638-d1bc5f7a-750e7c19-e936885c-3d4fd2d6-c3" target="_blank">AskMyHR</a>: Select My Team/Organization > Employee & Labour Relations > Employee Personnel File.
    <ul><li><a href="/docs/completion_probation.docx">Completion of Probation Letter (DOCX, 47KB)</a></li>
    <li><a href="/docs/completion_probation_pay_increase.docx">Completion of Probation & Pay Increase Letter - Excluded (DOCX, 89KB)</a></li></ul>'
            ],

        ];

        foreach ($list as $l) {
            ConversationTopic::updateOrCreate([
                'id' => $l['id'],
            ], $l);
        }
    }
}
