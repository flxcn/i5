# Database Tables

## Contacts
*ContactID int(11) No*
*ClientID int(11) No*
UserAddedID int(11) No
UserEditID int(11) No
**ContactDate datetime No**
ContactEditDate timestamp No CURRENT_TIMESTAMP Last time somebody
edited the contact
ContactTypeID int(11) No
ContactSummary longtext 

## DEPRECATED: CaseInfo
CaseInfoID int(11) No
ClientID int(11) No 0
CaseTypeID int(11) No 0
Date datetime Yes NULL
CategoryID int(11) No 0
CaseSide varchar(16) Yes NULL
Opposing varchar(64) Yes NULL // deprecate?
OpposingCorp char(1) Yes NULL // deprecate?
Notes longtext Yes NULL
RecAction longtext Yes NULL
CreateBy int(11) No 0
LastEditBy int(11) No 0
OfficeID int(11) No 0
ReferredTo int(11) No 0
LastAccessed char(1) No 0
BilingualRef char(1) No 0

## Case Types
CaseTypeID int(11) No 0
Description varchar(128) Yes NULL
Deprecated char(1) Yes 0

## IMPORTANT: Category
CategoryID int(11) No
Description varchar(64) Yes NULL
SortKey int(11) No 0

## IMPORTANT: Clients
ClientID int(11) No
LastName varchar(32) Yes NULL
FirstName varchar(32) Yes NULL
Phone1AreaCode char(3) Yes NULL
Phone1Number varchar(8) Yes NULL
LongDistance1 char(1) Yes NULL
Phone1Type char(1) Yes NULL
Phone2AreaCode char(3) Yes NULL
Phone2Number varchar(8) Yes NULL
LongDistance2 char(1) Yes NULL
Phone2Type char(1) Yes NULL
**Address1 varchar(64) Yes NULL**
**Address2 varchar(64) Yes NULL**
City varchar(32) Yes NULL**
State char(2) Yes MA**
ZIP varchar(5) Yes NULL**
Country varchar(16) Yes USA**
Language varchar(16) Yes English**
Notes longtext Yes NULL
DemosOK char(1) No 0
ReferralSource text Yes NULL
ReferralSpecify text No
Email varchar(100) Yes NULL
CaseTypeID int(11) No 0
CategoryID int(11) No 10
**LastEditTime timestamp No CURRENT_TIMESTAMP Time of Last Edit, AutoMYSQL Updated**
CourtDate date Yes NULL

## DEPRECATED: Contact
ContactID int(11) No
ClientID int(11) No 0
CaseInfoID int(11) No 0
UserID int(11) No 0
GroupID int(11) No 0
Date datetime Yes NULL
ContactTypeID int(11) Yes NULL

## IMPORTANT: Contact Type 
**NOTE: Let's do a histogram to see which ones are actually being used.**
ContactTypeID int(11) No 0
Description varchar(64) Yes NULL
Visible char(1) Yes NULL

## DEPRECATED: Demographics
RecordID int(11) No
ZIP varchar(5) Yes NULL
SizeHousehold int(11) Yes NULL
HouseholdIncome int(11) Yes NULL
Race varchar(32) Yes NULL
Occupation varchar(32) Yes NULL
Gender char(1) Yes NULL
Age int(11) Yes NULL
PublicAssist char(1) Yes NULL
PublicAssistType varchar(64) Yes NULL
ReferralSource varchar(64) Yes NULL
Notes text Yes NULL
DATE timestamp No CURRENT_TIMESTAMP
SourceReferral int(11) Yes NULL
PrimaryLanguage int(2) No

## DEPRECATED: emails
id int(11) No
sender varchar(100) No
subject varchar(255) No
message text No
timestamp timestamp No CURRENT_TIMESTAMP
isAssigned tinyint(1) No
ClientID int(11) No

## IMPORTANT: ReferralSources
ReferralSourceID int(11) No
Description varchar(64) Yes NULL
SortKey int(11) No 0

## DEPRECATED: admins // merged into roles

## DEPRECATED: announce 
AnnounceID int(11) No
UserID int(11) Yes NULL
Name varchar(128) Yes NULL
Description text Yes NULL
Date date Yes NULL
Time time Yes NULL
Start date Yes NULL
End date Yes NULL
Committee varchar(32) Yes NULL

## DEPRECATED: calendar
CalID int(11) No
Begin datetime Yes NULL
End datetime Yes NULL
User1ID char(5) Yes NULL
User2ID char(5) Yes NULL
User3ID char(5) Yes NULL
isWorkgroup char(1) Yes NULL
OfficeID char(1) Yes NULL

## IMPORTANT: log // INCLUDE? //  // why does it matter how long you spend? Maybe if you did a lot of work
LogID int(11) No
UserID int(11) No 0
GroupID int(11) No 0
OfficeID int(11) Yes NULL
Login datetime Yes NULL
LastAction timestamp No CURRENT_TIMESTAMP
Logout datetime Yes NULL
IP varchar(15) Yes NULL

## DEPRECATED: passwords --> merged into users table
UserID int(11) No
hash varchar(60) No

## DEPRECATED: quotes // not essential
quote varchar(200)

## IMPORTANT: users
UserID int(10) No
UserName varchar(50) Yes NULL
Email varchar(64) Yes NULL
**YOG int(11) Yes NULL**
Comper char(1) No 0
GroupID int(11) Yes 0
LegalResearch char(1) No 0
LegalResearchDir char(1) No 0
Communications char(1) No 0
CommunicationsD
ir
char(1) No 0
Finance char(1) No 0
FinanceDir char(1) No 0
Training char(1) No 0
TrainingDir char(1) No 0
TrainingWGL char(1) No 0
BostonOffice char(1) No 0
BostonOfficeDir char(1) No 0
CommunityOutreach char(1) No 0
CommunityOutreachDir char(1) No 0
CourthouseRelations char(1) No 0
CourthouseRelationsDir char(1) No 0
LawReform char(1) No 0
LawReformDir char(1) No 0
PBHOffice char(1) No 0
PBHOfficeDir char(1) No 0
**Admin char(1) No 0**
Hidden char(1) No 0
Bilingual char(1) No 0
BilingualDir char(1) No 0
Chinatown char(1) Yes 0
ChinatownDir char(1) Yes 0

## NEW: roles
Admin char(1) No 0
Comper char(1) No 0

Optionally:

LegalResearch char(1) No 0
LegalResearchDir char(1) No 0
Communications char(1) No 0
CommunicationsD
ir
char(1) No 0
Finance char(1) No 0
FinanceDir char(1) No 0
Training char(1) No 0
TrainingDir char(1) No 0
TrainingWGL char(1) No 0
BostonOffice char(1) No 0
BostonOfficeDir char(1) No 0
CommunityOutreach char(1) No 0
CommunityOutreachDir char(1) No 0
CourthouseRelations char(1) No 0
CourthouseRelationsDir char(1) No 0
LawReform char(1) No 0
LawReformDir char(1) No 0
PBHOffice char(1) No 0
PBHOfficeDir char(1) No 0
**Admin char(1) No 0**
Hidden char(1) No 0
Bilingual char(1) No 0
BilingualDir char(1) No 0
Chinatown char(1) Yes 0
ChinatownDir char(1) Yes 0

## NEW: role users

## Many To Many

Many-to-many relations are a more complicated relationship type. An example of such a relationship is a user with many roles, where the roles are also shared by other users. For example, many users may have the role of "Admin". Three database tables are needed for this relationship: users, roles, and role_user. The role_user table is derived from the alphabetical order of the related model names, and should have user_id and role_id columns.

We can define a many-to-many relation using the belongsToMany method:

class User extends Eloquent {
 
    public function roles()
    {
        return $this->belongsToMany('Role');
    }
 
}

Now, we can retrieve the roles through the User model:

$roles = User::find(1)->roles;

If you would like to use an unconventional table name for your pivot table, you may pass it as the second argument to the belongsToMany method:

return $this->belongsToMany('Role', 'user_roles');

https://laraveldaily.com/nested-resource-controllers-and-routes-laravel-crud-example/