<?php

return [
    'status' => [
        'active' => [
            'color' => 'primary',
            'tooltip' => 'Currently in progress or scheduled for a future date',
        ],
        'achieved' => [
            'color' => 'success',
            'tooltip' => 'Supervisor and employee agree objectives met',
        ],
        'not met' => [
            'color' => 'danger',
            'tooltip' => 'Substantial portion incomplete by target date',
        ],
        'cancelled or deferred' => [
            'color' => 'warning',
            'tooltip' =>
                'Shift in plans but want to archive goal for future reference',
        ],
    ],

    'conversation' => [
        'topic' => [
            // Performance Check-in
            '1' => [
                'questions' => [
                    'Overall, how would you describe your work since our last check-in?',
                    'What progress have you made against your goals? ',
                    'Have your goals shifted?  Tell me about that.',
                    'What accomplishments are you most proud of? How do you think your role helps the work unit succeed?',
                    'What challenges have you faced? Did you learn anything? Is there anything that our team or organization could learn from that you would be open to sharing?',
                    'What support do you need from me as your supervisor to perform at your best? What do I do that is most/least helpful for you when it comes to completing your work?',
                    'In what areas do you need or want to improve? What would help you improve? Are there specific skills or competencies we should focus on moving forward?',
                    'What motivates you to get your job done?',
                    'Which job responsibilities/tasks do you enjoy most? Which do you least enjoy?',
                    'Are you finding anything difficult or stressful?',
                    'What opportunities are you looking for moving forward? Do you have any interests or skills we could consider integrating into your work?',
                    'How do you prefer to receive feedback and/or recognition for your work?',
                    'What (if any) concerns do you have when it comes to giving me feedback? How can I alleviate those concerns?',
                ],
            ],
            // Goal Setting
            '2' => [
                'questions' => [
                    'Reflecting on our ministry, branch, and team goals, which ones are you responsible for and most interested in? How might your personal goals align with those of the organization?',
                    'I’ve shared our team goals and my priorities, how can we work together to achieve these goals?',
                    'What are you interested or passionate about?',
                    'What strengths do you want to use more of? (Think about what you do effortlessly. What are you doing when you are at your best?)',
                    'What are your greatest growth opportunities?',
                    'What are your career aspirations? What do you think you need to learn and/or achieve to get there?',
                    'Imagine what success will look like: These will be your performance measures (remember to pick results that are within your control and/or influence). What are the milestones?',
                    'What competencies and values will you need or want to focus on to achieve your goals?',
                    'What do you need to learn to achieve your goals? Do you have any gaps that you want to address?',
                    'What are the barriers to your success? How will you overcome them?',
                ],
            ],
            // Career Development
            '3' => [
                'questions' => [
                    'What are your career goals? What do you think you need to get there?',
                    'How do you see your career in the BCPS developing?',
                    'In what areas do you want to grow? What can I and/or the organization do to help support your development?',
                    'How would you define “success” for your career?',
                    'What impact do you want to have in your work?  What is the legacy you want to leave behind?',
                    'What do you need or want to learn, so your knowledge and skills are current?',
                    'What kind of leadership style motivates or inspires you to be your best?',
                    'What one thing could I do to better support your career development?',
                    'What one thing you could do to better support your own career development?',
                    'What do you want your next position to be? How would your responsibilities change?',
                    'Do you have specific goals you’d like to achieve in the next year, two years, longer?',
                ],
            ],
            // Performance Improvement
            '4' => [
                'questions' => [
                    'Tell me about how things have been going for you in your role. ',
                    'What is going well? ',
                    'Where do you see opportunities for improvement?',
                    'Supervisor: Verbally summarize the high-level performance expectations you’ve identified in the performance profile as requiring further development.',
                    'You can also Identify areas the employee is doing well.',
                    'To meet these expectations, what support do you need?',
                    'This could be coaching, tools, resources, additional training, etc.',
                    'Between now and our next conversation, I would like you to work on 2-3 areas we’ve discussed as requiring development. What specific steps will you take to meet these expectations?',
                    'We will follow up on these areas and discuss your progress during our next meeting. If needed, we can discuss an action plan for improvement in each of those areas when we meet again.',
                    'Is there anything else you would like to share with me or any other reasonable support that I can offer?',
                ],
            ],
            // Recognition
            '5' => [
                'questions' => [
                    'Supervisor: Provide a verbal overview of the actions or results being celebrated. Be as specific as possible about timing, activities, and outcomes achieved. Highlight behaviours, competencies, and corporate values that you feel contributed to the success. Connect the work to the goals and/or values of the organization.',
                    'What aspect of this accomplishment are you most proud of?',
                    'What challenges did you face? Did you learn anything? Is there anything that our team or organization could learn from that you would be open to sharing?',
                    'Who else contributed to your success?',
                    'How would you like to celebrate success? Do you prefer one-on-one discussions or would you like more public or team-oriented recognition?',
                ],
            ],
            // Onboarding
            '6' => [
                'questions' => [
                    'Do you have a clear understanding of the expectations for this role?',
                    'Do you feel like you’ve received access to all of the information, tools, and resources you need to complete your responsibilities? What additional supports or information do you need? Are there any specific tools or training sessions that you think would help you be more successful?',
                    'What would help you feel connected to the rest of the team?',
                    'What, if anything, is still unclear to you in terms of your duties and our work policies?',
                    'What roadblocks or challenges, if any, have you encountered while training or when performing your duties? ',
                    'Moving forward, what would you like to accomplish in the next 30 days? 60 days? 90 days?',
                    'Do you have any expertise or experience that you think could be better utilized?',
                    'How well do you understand the Corporate Plan, your ministry’s vision, mission and mandate etc.?',
                    'What supports do you need from me as your supervisor?',
                    'How do you prefer to receive feedback and/or recognition for your work?',
                    'Is there anything else you’d like for me to know?',
                    'Is there anything you would like more information on or to understand better?',
                    'What would be the best use of our one-on-one time?',
                    'What area of the organization would you like to learn more about?',
                    'Which aspects of the job are you excited about? Which are you worried about?',
                ],
            ],
            '7' => [
                'questions' => [
                    'Tell me about how things have been going for you in your role. ',
                    'What accomplishments are you most proud of? How do you think your role helps the work unit succeed?',
                    'What challenges have you faced? Did you learn anything? Is there anything that our team or organization could learn from that you would be open to sharing?',
                    'Supervisor: Verbally summarize the high-level performance expectations for the role and identify areas of strength and areas that require further development.',
                    'Do you feel like you’ve received access to all of the information, tools, and resources you need to complete your responsibilities? What additional supports or information do you need? Are there any specific tools or training sessions that you think would help you be more successful?',
                    'What, if anything, is still unclear to you in terms of your duties and our work policies?',
                    'Which job responsibilities/tasks do you enjoy most? Which do you least enjoy?',
                    'Are you finding anything difficult or stressful?',
                    'What opportunities are you looking for moving forward? Do you have any interests or skills we could consider integrating into your work?',
                    'What strengths do you want to use more of? (Think about what you do effortlessly. What are you doing when you are at your best?)',
                    'What are your greatest growth opportunities?',
                ],
            ],
        ],
    ],
];
