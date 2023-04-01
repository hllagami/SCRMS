# Phase II: User requirements and application specifications
Deadline: 05.04.2023 23:59  
  
    Each group should choose a development model for their application, and submit user requirements and application specifications.
    
### Development model: Plan-driven
**Reasoning:**  
- This software's development is part of a Software Engineering Course, following a plan specified by the course lecturer.
- Preparing a detailed documentation and specificiation prior to implementation is important to guarantee the project fulfills its purpose as best as possible.
- Incremental delivery might not work as planned, as customer feedback cannot be procured in a timely manner.
- The system is expected to have a lifespan of around 2-4 years, due to constant market changes and technological advancements.
- Due to the circumstances of this software's development process, the team is unlikely to work on extended software evolutions.
- The development team is comprised of a single student, working in collaboration with the CEN302 Assistant Lecturers.

### User and System Requirements
**User Requirements:**
- An overview of customer data, sales leads, and performance metrics. 

      The application shall have a dashboard page, displaying various information about the company's CRM overview and situation.
- A display of customer interactions, purchase history, and customer preferences. It should include a timeline of customer interactions and a summary of their purchase history.  

      The application shall have a Customer Profile Page, where the basic personal information of a customer will be displayed.
- A feature to allow businesses to track sales leads, manage sales pipelines, and prioritize leads based on their potential value.
      
      The application shall have a Lead Management section, where the company will be able to keep track of their monthly sales, by using the Customer Retention Strategy.
- An automated feature which allows businesses to send personalized messages, emails, and offers to customers based on their behavior and preferences.  

      The application shall contain an Automated Communication feature, where the company will be able to send messages to their loyal and subscribed customers.
- A Registration and Sign-In function for guests. users, and staff.  

      The application shall have a Registration and Sign-In option, where users will be directed to their appropriate company/business.
- Overall, it's important to ensure that the software is user-friendly and intuitive, so users can easily navigate and use all of its features.   

**System Requirements:**
1.  **Dashboard:**  
  1.1 The dashboard should display an overview of customer data, sales leads, and performance metrics.  
  1.2 It should have widgets for new leads, sales pipeline, revenue, and customer engagement.  
  1.3 The dashboard should be customizable to allow users to add or remove widgets based on their preferences.  
  1.4 Real-time updates should be provided to ensure that the dashboard is always up-to-date.  
  1.5 The dashboard should have interactive elements, such as drop-down menus, clickable charts, to allow users to explore the data and gain deeper insights.  
  1.6 The dashboard should be responsive and adaptable to different screen sizes, such as desktop, tablet, and mobile devices, to ensure that users can access the information from anywhere and at any time.  
  1.7 The dashboard should be visually appealing and easy to read, with clear and concise labels, icons, colors, to help users understand the data quickly and easily.  
  1.8 The dashboard should have filters and sorting options to allow users to segment the data based on specific criteria, such as date range, product category, or customer segment.  
  1.9 The dashboard should have export and print options to allow users to download or print the data in various formats, such as PDF or Excel, for further analysis or reporting.  
  
2.  **Customer Profile Page:**  
  2.1 The customer profile page should display customer interactions, purchase history, and customer preferences.  
  2.2 It should include a timeline of customer interactions, a summary of their purchase history, and a section for managing customer preferences.  
  2.3 Users should be able to add notes and tags to customer profiles to make it easier to search for specific information.  
  2.4 The customer profile page should be searchable to allow users to quickly find specific customers.  
  2.5  The customer profile page should display relevant marketing and sales campaigns that the customer has been exposed to, such as email newsletters or targeted ads, to help users understand the customer's interests and preferences.   
  2.6 The customer profile page should have a section for managing customer feedback, such as ratings, reviews, and complaints, to help users track and address customer concerns.  
  
3.  **Lead Management:**  
  3.1 The lead management feature should allow businesses to track sales leads, manage sales pipelines, and prioritize leads based on their potential value.  
  3.2 It should include a dashboard for managing leads, a drag-and-drop pipeline management tool, and reporting on lead conversion rates.  
  3.3 Users should be able to add notes and tags to leads to make it easier to search for specific information.  
  3.4 The lead management feature should be searchable to allow users to quickly find specific leads.  
  3.5  The lead management feature should have a lead scoring system to help users prioritize leads based on their likelihood to convert, using criteria such as demographics, behavior, and engagement.  
  3.6 The lead management feature should allow users to assign leads to specific sales reps or teams, and track their progress and performance, to help users optimize their sales process and resources.   
  3.7 The lead management feature should have automated workflows and notifications to help users follow up with leads at the right time and with the right message, based on their stage in the pipeline or behavior triggers.   
  3.8 The lead management feature should integrate with other marketing and sales tools, such as email marketing or analytics platforms, to help users streamline their workflows and data management.    
  3.9 The lead management feature should allow users to import or export leads in various formats, such as CSV or Excel, to help users manage leads from different sources or platforms.    
  3.10 The lead management feature should have data visualization and forecasting tools to help users analyze and predict their sales pipeline performance, and identify areas for improvement and growth.  
  
4.  **Automated Communication:**  
  4.1 The automated communication feature should allow businesses to send personalized messages, emails, and offers to customers based on their behavior and preferences.  
  4.2 It should include a tool for designing email campaigns, a messaging tool for sending targeted messages, and an offer management tool for creating personalized offers.  
  4.3 Users should be able to create segments of customers based on specific criteria, such as behavior, preferences, or demographics.  
  4.4 The automated communication feature should be customizable to allow users to set up triggers for automated messages, such as a customer making a purchase or abandoning their cart.  
  4.5 The automated communication feature should allow users to schedule and automate follow-up messages, such as welcome messages, thank-you messages, or post-purchase messages, to help users engage with customers at key touchpoints in their journey.   
  4.6 The automated communication feature should integrate with other marketing and sales tools, such as CRM, analytics, or social media platforms, to help users manage and track their communication efforts across channels.   
  4.7 The automated communication feature should have data tracking and analytics tools to help users measure and analyze their messaging performance, such as open rates, click-through rates, or conversion rates, and identify areas for improvement and optimization.   
  4.8 The automated communication feature should provide real-time feedback and insights to users, such as alerts for high-value customers or trends in customer behavior, to help users stay on top of their communication strategy and opportunities.   
    
5.  **Registration and Sign-in Page:**  
  5.1 Guests can click on the Log-in button/option on the main page to Register or Sign-in as desired.  
  5.2 To register, guests can submit a form which will contain their full name, username, email, password, and phone number.  
  5.3 Users will be able to Sign-in using their username and password, and are able to Sign Out at the click of a button. 
  5.4 Signed-In users will be redirected to their appropriate business.  
  5.5 Users can change their passwords at a later time.  
  5.6 A Forgot Password function will be implemented for users who have forgotten their hidden codes. This code will be sent to their email accounts as a verification.

### Application Specifications  
  
**Functional System Requirements**  
  - Requirement #1  
  Description: The application shall have a Dashboard page.  
  Rationale: To display various information about the company's CRM overview and situation.  
  Fit Criterion: The information must coincide with the contents of the customers' Database.  
  
  - Requirement #2  
  Description: The application shall have a Customer Profile Page.  
  Rationale: To display the basic personal information of a customer.  
  Fit Criterion: The information must coincide with the contents of the customers' Database.  
  
  - Requirement #3  
  Description: The application shall have a Lead Management section.  
  Rationale: To keep track of their monthly sales, by using the Customer Retention Strategy.
  Fit Criterion: The information will be displayed after applying the appropriate formula to calculate the Retention Rate.

  - Requirement #4  
  Description: The application shall have a Automated Communication feature.  
  Rationale: To send personalized messages to their loyal and subscribed customers.  
  Fit Criterion: A default message must be created prior. The customers' personal information will be retrieved later from the Database and replaced in the final message.   
  
  - Requirement #5  
  Description:  The application shall have a Registration and Sign-In option.  
  Rationale: To redirect users to their appropriate business and access their customers' information.  
  Fit Criterion: A form must be submitted containing a unique username and corresponding password. Both fields must be set at the moment of Registration, and only the password can be changed at a later moment in time.  

**Non-Functional System Requirements**  
1.  Performance Requirements:  The software should be able to handle a large volume of data, transactions, and user requests with minimal latency and response time.  
2.  Scalability Requirements:  The software should be able to scale up or down to meet changing business needs, such as adding new users, features, functionalities.  
3.  Security Requirements:  The software must have security measures in place to protect customer data, prevent unauthorized access, and comply with data protection regulations. Email verifications will be used in the case a user forgets their passwords. 
4.  Software Quality Attributes:  The software must be easy to maintain, with modular and reusable code, clear documentation, and a well-defined development process. Additionally, it must be highly available, fault-tolerant, and resilient to ensure that the system can recover from failures, outages, or errors with minimal downtime.  
5.  Business Rules:  The software should define different user roles with specific permissions and access levels based on their job responsibilities and the data they need to access. For example, a sales representative might have access to customer contact information and sales data, while an administrator might have access to system settings and user management.


    
    
  
