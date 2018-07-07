<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\Member::create([
            'name' => 'Aurangzeb (Zeb) Bhatti',
            'title' => 'Team',
            'designation_en' => 'Co-Founder and CTO',
            'avatar' => 'storage/avatars/bhatti.jpeg',
            'description_en' => 'Nenad Balog has vast knowledge regarding principles of software engineering, latest development tools and techniques, and technical aspects of blockchain technology. He has excellent managerial and leadership skills, business sense, and communication skills which make him a very effective and efficient IT professional.',
            'linkedin' => 'https://www.linkedin.com/in/aurangzeb-bhatti-a0075bb/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Javed Nawaz',
            'title' => 'Team',
            'designation_en' => 'Co-Founder & CEO',
            'avatar' => 'storage/avatars/javed.jpeg',
            'description_en' => 'Aleksandar is an end-to-end product developer. He is a full-stack web developer who is fiercely passionate about the user experience and interaction of a product. Aleksander has previously worked as senior front-end developer and website developer. He is currently working for Upstack as a full-stack javascript developer.',
            'linkedin' => ''
        ]);

        \BCES\Models\Member::create([
            'name' => 'Dan Madoni',
            'title' => 'Team',
            'designation_en' => 'Sr. Software Architect',
            'avatar' => 'storage/avatars/dan.jpeg',
            'description_en' => 'Milos is a freelance Mission-driven full stack developer with a passion for thoughtful UI design, collaboration, and proficient knowledge of Blockchain technology. He is currently working on development of blockchain technology based solutions.',
            'linkedin' => 'https://www.linkedin.com/in/danmadoni/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Ejaz Anwer',
            'title' => 'Team',
            'designation_en' => 'Sr. Software Developer',
            'avatar' => 'storage/avatars/ejaz.jpeg',
            'description_en' => 'Having great understanding regarding blockchain technology, Nikola is a passionate and skilled Blockchain developer. He had been working as a freelance web developer for 2 years and has worked as project coordinator at Voluntary Organization Svilajnac -VOS. Nikola is currently working as a front-end developer at Mirror code.',
            'linkedin' => ''
        ]);

        \BCES\Models\Member::create([
            'name' => 'Lisa Neely',
            'title' => 'Team',
            'designation_en' => 'Training & Curriculum Development',
            'avatar' => 'storage/avatars/lisa.jpeg',
            'description_en' => 'Sara is a professional web developer and copywriter. Her core skills include Javascript, AngularJS, Node.JS, AJAX, JQuery, HTML, CSS, and SEO. She has been working as a freelance website developer. Currently, Sara is giving her services as a freelancer.',
            'linkedin' => 'https://www.linkedin.com/in/lisa-neely-5042494/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Leah Dineen',
            'title' => 'Team',
            'designation_en' => 'Project Manager',
            'avatar' => 'storage/avatars/leah.jpeg',
            'description_en' => 'Having 7 years of experience in the field of graphic designing, Vladimir is a highly skilled professional UI/UX designer. Vladimir creates attractive and user friendly interfaces for websites. Currently, Vladimir is working as a senior UI/UX designer at FreeeUp.',
            'linkedin' => 'https://www.linkedin.com/in/leahdineen/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Abdullah Ahmed',
            'title' => 'Team',
            'designation_en' => 'Mobile Applications Lead',
            'avatar' => 'storage/avatars/abdullah.jpeg',
            'description_en' => 'Hamza is a passionate project manager and he is acting as Director Project Manager at Blockchain Expert Solutions. With more than 7 years of experience in the field he is now an expert in Agile methodologies and processes. He has previously served his services as product and project manager at upwork, Miranz and FITA ventures.',
            'linkedin' => ''
        ]);

        \BCES\Models\Member::create([
            'name' => 'Muhammad Awais Chughtai',
            'title' => 'Team',
            'designation_en' => 'Platform Development Lead',
            'avatar' => 'storage/avatars/awais.jpeg',
            'description_en' => 'Qasid is a blockchain analyst and works with the development of business model feasibility with regards to Blockchain. He has expertise in Smart Contracts including crowd sale (Initial Coin Offerings), Dividend Bearing Tokens, Custom Wallet Creation (for Ethereum, Nem).',
            'linkedin' => 'https://www.linkedin.com/in/muhammad-awais-chughtai-88577b4a/ '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Charles Miedzinski',
            'title' => 'Team',
            'designation_en' => 'Sr. Software Architect',
            'avatar' => 'storage/avatars/charles.jpeg',
            'description_en' => 'A passionate, research oriented fresh graduate with strong analytical, conceptual and reasoning skills. He is currently working as a research analyst at Blockchain Expert Solutions where his responsibilities include white paper writing, business analysis, market research, and writing website content as well.',
            'linkedin' => 'https://www.linkedin.com/in/charles-miedzinski-220786/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Mudaser Iqbal',
            'title' => 'Team',
            'designation_en' => 'Blockchain Consultant',
            'avatar' => 'storage/avatars/mudaser.jpeg',
            'description_en' => 'Talha Yusuf is an expert blockchain developer. He has been involved in the blockchain community from earliest 2017. He is currently serving as a blockchain developer at Blockchain Expert Solutions where he works with Smart Contracts, Ethereum, Truffle framework, and Private Blockchain Development efficiently.',
            'linkedin' => 'https://www.linkedin.com/in/mudaseriqbal/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Rosheel Baig',
            'title' => 'Team',
            'designation_en' => 'Technical Lead',
            'avatar' => 'storage/avatars/rosheel.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/rosheellbaig/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Faryal Qazi',
            'title' => 'Team',
            'designation_en' => 'Research Analyst',
            'avatar' => 'storage/avatars/faryal.jpeg',
            'description_en' => 'Having 5 years of experience, Faryal is a competent Researcher and Blockchain business developer. She is efficient in white paper writing, development, blockchain researching, Initial Coin Offerings, business analysis, business development, competitor analysis, portfolio management, and project management.',
            'linkedin' => 'https://www.linkedin.com/in/faryal-qazi-532541a7/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Waqar Ahmed',
            'title' => 'Team',
            'designation_en' => 'Financial Analyst',
            'avatar' => 'storage/avatars/waqar.png',
            'description_en' => 'Waqar is our Business and Financial analyst working with feasibilities. He has previously worked as blockchain business analyst, digital marketing manager, chief operating officer, and as education ambassador in various notable companies and institutes.',
            'linkedin' => 'https://www.linkedin.com/in/waqarahmedpk/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Junaid Mushtaq',
            'title' => 'Team',
            'designation_en' => 'Blockchain Developer',
            'avatar' => 'storage/avatars/junaid.jpeg',
            'description_en' => 'Nasir is a senior software architecture engineer having 6 years of experience in HTML, wordpress, and graphics designing and he is currently managing the responsibilities of Design and Architect of client application at Blockchain Expert Solutions.',
            'linkedin' => 'https://www.linkedin.com/in/junaid-mushtaq-171112126/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Nasir Mehmood',
            'title' => 'Team',
            'designation_en' => 'Software Architect',
            'avatar' => 'storage/avatars/nasir.jpeg',
            'description_en' => 'Nasir is a senior software architecture engineer having 6 years of experience in HTML, wordpress, and graphics designing and he is currently managing the responsibilities of Design and Architect of client application at Blockchain Expert Solutions.',
            'linkedin' => 'https://pk.linkedin.com/in/oknasir/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Faizah Bhatti',
            'title' => 'Advisor',
            'designation_en' => 'Creative Director at GIA',
            'avatar' => 'storage/avatars/faizah.jpeg',
            'description_en' => 'Mudaser is a serial entrepreneur having 10 years of experience in IT industry and is also CEO and founder of Blockchain Expert Solutions. He is a blockchain expert, expert in white paper writing, blockchain development, ICO Planning and execution, financial analysis of projects and other critical matters related to Blockchain.',
            'linkedin' => 'https://www.linkedin.com/in/faizah-bhatti-b037151/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Bert-Ola Bergstrand',
            'title' => 'Advisor',
            'designation_en' => 'Advisor',
            'avatar' => 'storage/avatars/bert.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/bert-ola-bergstrand-33222322/ '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Antoinette Matlins',
            'title' => 'Advisor',
            'designation_en' => 'Advisor',
            'avatar' => 'storage/avatars/antoinette.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/antoinette-matlins-pg-fga-28a1045/ '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Noreen Khan',
            'title' => 'Advisor',
            'designation_en' => 'Finance Advisor',
            'avatar' => 'storage/avatars/noreen.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'http://www.bartvault.com/advisors-noreen-khan.html '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Robin Kennedy',
            'title' => 'Advisor',
            'designation_en' => 'Advisor',
            'avatar' => 'storage/avatars/robin.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/robin-kennedy-6247774/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Mr. Naveed Malik',
            'title' => 'Advisor',
            'designation_en' => 'Advisor',
            'avatar' => 'storage/avatars/naveed.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'http://www.bartvault.com/advisors-naveed-malik.html'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Sarah Hameed',
            'title' => 'Advisor',
            'designation_en' => 'Advisor',
            'avatar' => 'storage/avatars/sarah.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'http://www.bartvault.com/advisors-sarah-hameed.html '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Mary Ann Burns',
            'title' => 'Advisor',
            'designation_en' => 'Marketing Professional',
            'avatar' => 'storage/avatars/mary.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/mary-ann-burns-a135b53/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Kathryn Bonanno',
            'title' => 'Advisor',
            'designation_en' => 'AntiQuorom Founder, (USA)',
            'avatar' => 'storage/avatars/kathryn.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'http://www.kathrynbonannogems.com/about-kathryn.html '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Hilda Khurram',
            'title' => 'Advisor',
            'designation_en' => 'S & L International',
            'avatar' => 'storage/avatars/hilda.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/hilda-khorram-017847/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Roger Boman',
            'title' => 'Advisor',
            'designation_en' => 'CEO of HPZ LLC',
            'avatar' => 'storage/avatars/roger.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'http://www.bartvault.com/advisors-roger-bowman.html '
        ]);

        \BCES\Models\Member::create([
            'name' => 'Doug Cabell',
            'title' => 'Advisor',
            'designation_en' => 'Director of Network Engineering, Badu NW',
            'avatar' => 'storage/avatars/doug.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'https://www.linkedin.com/in/dougcabell/'
        ]);

        \BCES\Models\Member::create([
            'name' => 'Jennifer-Lynn Archuleta',
            'title' => 'Advisor',
            'designation_en' => 'Editor, Gems & Gemology at GIA',
            'avatar' => 'storage/avatars/jennifer.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => ''
        ]);

        \BCES\Models\Member::create([
            'name' => 'Saeed Akhtar',
            'title' => 'Advisor',
            'designation_en' => 'Artist ',
            'avatar' => 'storage/avatars/saeed.jpeg',
            'description_en' => 'Focusing on marketing and business development Rosheel Baig has been involved in crypto industry since 2012. He is the Co-founder and COO of Blockchain Expert Solutions (BES). He is an active advisor for several ICO’s and his capabilities of highly excellent communications with client and a very quick response time, and experience help the organization in progressing.',
            'linkedin' => 'http://www.bartvault.com/advisors-saeed-akhtar.html'
        ]);
    }
}
