# Database Tables

## Contacts
*ContactID int(11) No*
*ClientID int(11) No*
UserAddedID int(11) No
UserEditID int(11) No
ContactDate datetime No
ContactEditDate timestamp No CURRENT_TIMESTAMP Last time somebody
edited the contact
ContactTypeID int(11) No
ContactSummary longtext 

## CaseInfo
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

## Category
CategoryID int(11) No
Description varchar(64) Yes NULL
SortKey int(11) No 0

## Clients
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
Address1 varchar(64) Yes NULL
Address2 varchar(64) Yes NULL
City varchar(32) Yes NULL
State char(2) Yes MA
ZIP varchar(5) Yes NULL
Country varchar(16) Yes USA
Language varchar(16) Yes English
Notes longtext Yes NULL
DemosOK char(1) No 0
ReferralSource text Yes NULL
ReferralSpecify text No
Email varchar(100) Yes NULL
CaseTypeID int(11) No 0
CategoryID int(11) No 10
LastEditTime timestamp No CURRENT_TIMESTAMP Time of Last Edit, AutoMYSQL Updated
CourtDate date Yes NULL

## Contact
ContactID int(11) No
ClientID int(11) No 0
CaseInfoID int(11) No 0
UserID int(11) No 0
GroupID int(11) No 0
Date datetime Yes NULL
ContactTypeID int(11) Yes NULL

## Contact Type
ContactTypeID int(11) No 0
Description varchar(64) Yes NULL
Visible char(1) Yes NULL

## Demographics
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

## emails
id int(11) No
sender varchar(100) No
subject varchar(255) No
message text No
timestamp timestamp No CURRENT_TIMESTAMP
isAssigned tinyint(1) No
ClientID int(11) No

## ReferralSources
ReferralSourceID int(11) No
Description varchar(64) Yes NULL
SortKey int(11) No 0

## admins

## announce
AnnounceID int(11) No
UserID int(11) Yes NULL
Name varchar(128) Yes NULL
Description text Yes NULL
Date date Yes NULL
Time time Yes NULL
Start date Yes NULL
End date Yes NULL
Committee varchar(32) Yes NULL

## calendar
CalID int(11) No
Begin datetime Yes NULL
End datetime Yes NULL
User1ID char(5) Yes NULL
User2ID char(5) Yes NULL
User3ID char(5) Yes NULL
isWorkgroup char(1) Yes NULL
OfficeID char(1) Yes NULL

## log
LogID int(11) No
UserID int(11) No 0
GroupID int(11) No 0
OfficeID int(11) Yes NULL
Login datetime Yes NULL
LastAction timestamp No CURRENT_TIMESTAMP
Logout datetime Yes NULL
IP varchar(15) Yes NULL

## passwords
UserID int(11) No
hash varchar(60) No

## quotes
quote varchar(200)

## users
UserID int(10) No
UserName varchar(50) Yes NULL
Email varchar(64) Yes NULL
YOG int(11) Yes NULL
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
CommunityOutrea
ch
char(1) No 0
CommunityOutrea
chDir
char(1) No 0
CourthouseRelatio
ns
char(1) No 0
CourthouseRelatio
nsDir
char(1) No 0
LawReform char(1) No 0
LawReformDir char(1) No 0
PBHOffice char(1) No 0
PBHOfficeDir char(1) No 0
Admin char(1) No 0
Hidden char(1) No 0
Bilingual char(1) No 0
BilingualDir char(1) No 0
Chinatown char(1) Yes 0
ChinatownDir char(1) Yes 0