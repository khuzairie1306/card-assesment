![image](https://github.com/khuzairie1306/card-assesment/assets/151608761/9f11a5e5-eb14-403b-a496-349df8f19273)
**Section A -  Cards Calculate**

Time to Complete = 5 hours;

Language / Technologies Used
  1 .  PHP (Backend)
  2 .  React (Front End)

For Test 
  1.  Copy Folder to Any folder on your pc
  2.  check NPM or node js is existing on your PC
  3.  Check PHP is already install if not please install and make global ex in environment varibles (windows)
  4.  After that if all are install go to PHP folder path into this system **CARD-ASSESSMENT -> PHP folder** and write "**PHP -S localhost:8000**"
  5.  IF step 4 is suceess go to card-assessment and write in terminal / cmd "**npm start**"

  ![image](https://github.com/khuzairie1306/card-assesment/assets/151608761/8911ccc9-593c-432c-b6c3-12a6dd45df96) 
  
  Above is For No **#4**

  
  ![image](https://github.com/khuzairie1306/card-assesment/assets/151608761/5a88e7d1-98ce-4e41-88e7-dc9e33afc49d)
  
  Above is For No **#5**


  6. If everything is success you can see picture in Below . You can test put the input and see the result .

  ![image](https://github.com/khuzairie1306/card-assesment/assets/151608761/62fc7ddd-d7ff-4285-8589-17498b716d47)

  
  ![image](https://github.com/khuzairie1306/card-assesment/assets/151608761/2c967a22-3c5a-4371-87fd-c53f83f03599)

  7. Inside People Distribute you need to key in integer only if not it will show the error , please refer picture that i show below

  ![image](https://github.com/khuzairie1306/card-assesment/assets/151608761/b9e98648-a8e7-40b8-8705-3dfd319d81e2) 

**Section B - Mysql Improvement**
Suggestion Improvement

1.You can Use Database indexes in MySQL enable you to accelerate the performance of SELECT query statements.  
2.You can also use pagination by using the LIMIT and OFFSET/FETCH clauses (i can see the below mysql query you already use).<br>
3.You also can use Temp table but with proper indexes.<br>
4. Caching - DECLARE use_cache BOOL DEFAULT true;<br>
5. You can install load balance for communicate one or more MySQL servers and provides connectivity to those servers for multiple clients.<br>
6. If you have proper indexes not worries about Like statement but recommend try to use equal statement if Like statement not necessary  .<br>

Below is Example Mysql For your side

SELECT Jobs.id AS `Jobs__id`,
Jobs.name AS `Jobs__name`,
Jobs.media_id AS `Jobs__media_id`,
Jobs.job_category_id AS `Jobs__job_category_id`,
Jobs.job_type_id AS `Jobs__job_type_id`,
Jobs.description AS `Jobs__description`,
Jobs.detail AS `Jobs__detail`,
Jobs.business_skill AS `Jobs__business_skill`,
Jobs.knowledge AS `Jobs__knowledge`,
Jobs.location AS `Jobs__location`,
Jobs.activity AS `Jobs__activity`,
Jobs.academic_degree_doctor AS `Jobs__academic_degree_doctor`,
Jobs.academic_degree_master AS `Jobs__academic_degree_master`,
Jobs.academic_degree_professional AS `Jobs__academic_degree_professional`,
Jobs.academic_degree_bachelor AS `Jobs__academic_degree_bachelor`,
Jobs.salary_statistic_group AS `Jobs__salary_statistic_group`,
Jobs.salary_range_first_year AS `Jobs__salary_range_first_year`,
Jobs.salary_range_average AS `Jobs__salary_range_average`,
Jobs.salary_range_remarks AS `Jobs__salary_range_remarks`,
Jobs.restriction AS `Jobs__restriction`,
Jobs.estimated_total_workers AS `Jobs__estimated_total_workers`,
Jobs.remarks AS `Jobs__remarks`,
Jobs.url AS `Jobs__url`,
Jobs.seo_description AS `Jobs__seo_description`,
Jobs.seo_keywords AS `Jobs__seo_keywords`,
Jobs.sort_order AS `Jobs__sort_order`,
Jobs.publish_status AS `Jobs__publish_status`,
Jobs.version AS `Jobs__version`,
Jobs.created_by AS `Jobs__created_by`,
Jobs.created AS `Jobs__created`,
Jobs.modified AS `Jobs__modified`,
Jobs.deleted AS `Jobs__deleted`,
JobCategories.id AS `JobCategories__id`,
JobCategories.name AS `JobCategories__name`,
JobCategories.sort_order AS `JobCategories__sort_order`,
JobCategories.created_by AS `JobCategories__created_by`,
JobCategories.created AS `JobCategories__created`,
JobCategories.modified AS `JobCategories__modified`,
JobCategories.deleted AS `JobCategories__deleted`,
JobTypes.id AS `JobTypes__id`,
JobTypes.name AS `JobTypes__name`,
JobTypes.job_category_id AS `JobTypes__job_category_id`,
JobTypes.sort_order AS `JobTypes__sort_order`,
JobTypes.created_by AS `JobTypes__created_by`,
JobTypes.created AS `JobTypes__created`,
JobTypes.modified AS `JobTypes__modified`,
JobTypes.deleted AS `JobTypes__deleted`
FROM jobs Jobs
LEFT JOIN jobs_personalities JobsPersonalities
ON Jobs.id = (JobsPersonalities.job_id)
LEFT JOIN personalities Personalities
ON (Personalities.id = (JobsPersonalities.personality_id)
AND (Personalities.deleted) IS NULL)
LEFT JOIN jobs_practical_skills JobsPracticalSkills
ON Jobs.id = (JobsPracticalSkills.job_id)
LEFT JOIN practical_skills PracticalSkills
ON (PracticalSkills.id = (JobsPracticalSkills.practical_skill_id)
AND (PracticalSkills.deleted) IS NULL)
LEFT JOIN jobs_basic_abilities JobsBasicAbilities
ON Jobs.id = (JobsBasicAbilities.job_id)
LEFT JOIN basic_abilities BasicAbilities
ON (BasicAbilities.id = (JobsBasicAbilities.basic_ability_id)
AND (BasicAbilities.deleted) IS NULL)
LEFT JOIN jobs_tools JobsTools
ON Jobs.id = (JobsTools.job_id)
LEFT JOIN affiliates Tools
ON (Tools.type = 1
AND Tools.id = (JobsTools.affiliate_id)
AND (Tools.deleted) IS NULL)
LEFT JOIN jobs_career_paths JobsCareerPaths
ON Jobs.id = (JobsCareerPaths.job_id)
LEFT JOIN affiliates CareerPaths
ON (CareerPaths.type = 3
AND CareerPaths.id = (JobsCareerPaths.affiliate_id)
AND (CareerPaths.deleted) IS NULL)
LEFT JOIN jobs_rec_qualifications JobsRecQualifications
ON Jobs.id = (JobsRecQualifications.job_id)
LEFT JOIN affiliates RecQualifications
ON (RecQualifications.type = 2
AND RecQualifications.id = (JobsRecQualifications.affiliate_id)
AND (RecQualifications.deleted) IS NULL)
LEFT JOIN jobs_req_qualifications JobsReqQualifications
ON Jobs.id = (JobsReqQualifications.job_id)
LEFT JOIN affiliates ReqQualifications
ON (ReqQualifications.type = 2
AND ReqQualifications.id = (JobsReqQualifications.affiliate_id)
AND (ReqQualifications.deleted) IS NULL)
INNER JOIN job_categories JobCategories
ON (JobCategories.id = (Jobs.job_category_id)
AND (JobCategories.deleted) IS NULL)
INNER JOIN job_types JobTypes
ON (JobTypes.id = (Jobs.job_type_id)
AND (JobTypes.deleted) IS NULL)
WHERE ((JobCategories.name LIKE '%キャビンアテンダント%'
OR JobTypes.name LIKE '%キャビンアテンダント%'
OR Jobs.name LIKE '%キャビンアテンダント%'
OR Jobs.description LIKE '%キャビンアテンダント%'
OR Jobs.detail LIKE '%キャビンアテンダント%'
OR Jobs.business_skill LIKE '%キャビンアテンダント%'
OR Jobs.knowledge LIKE '%キャビンアテンダント%'
OR Jobs.location LIKE '%キャビンアテンダント%'
OR Jobs.activity LIKE '%キャビンアテンダント%'
OR Jobs.salary_statistic_group LIKE '%キャビンアテンダント%'
OR Jobs.salary_range_remarks LIKE '%キャビンアテンダント%'
OR Jobs.restriction LIKE '%キャビンアテンダント%'
OR Jobs.remarks LIKE '%キャビンアテンダント%'
OR Personalities.name LIKE '%キャビンアテンダント%'
OR PracticalSkills.name LIKE '%キャビンアテンダント%'
OR BasicAbilities.name LIKE '%キャビンアテンダント%'
OR Tools.name LIKE '%キャビンアテンダント%'
OR CareerPaths.name LIKE '%キャビンアテンダント%'
OR RecQualifications.name LIKE '%キャビンアテンダント%'
OR ReqQualifications.name LIKE '%キャビンアテンダント%')
AND publish_status = 1
AND (Jobs.deleted) IS NULL)
GROUP BY Jobs.id
ORDER BY Jobs.sort_order desc,
Jobs.id DESC LIMIT 50 OFFSET 0
  



  

