## Cars API
In this project you have to implement a REST full API for Car resource. Each car has the following properties:
- ID : auto increment
- Model: string
- Year: integer between 1380 to 1401
- Color: string enum (white,black,blue,red)

Three issuses are defined:
- issue #1 is easy and mandatory. you have to create the API on this issue.
- issue #2 is bouns and recommended to be done. you have to create swagger documentation on this issue and activate swagger-ui so that we can test your API.
- issue #3 is bonus and optional. you can do it to show off your skills!

$`\textcolor{red}{Notice}`$ : this project is configured to work with our CI/CD pipeline. please do not create new laravel project from scratch. just clone this repository.

## Git Flow
The main branch is protected. you can not push any commits to it, you can just merge your development branches to it. So for any issue or feature checkout a new branch, and after you are done with that issue do a merge request to main branch.

We use fast-forward method for merge request and we also squash all commits in your dev bracnh. It means that all your commits will be converted into a single commit in main branch. This is to keep our main branch clean.

So after any successfull merge you have to pull main branch and checkout new branch to continue the work.

## Pipeline
Our pipeline will be activated on merge requests. There are 4 test jobs:
- unit testing
- API testing
- code quality
- swagger validation

For now only swagger validation is real and the other three jobs are just place holders and don't do anything.
If tests pass then deploy stage will be activated. Wait until deploy job is completed and 'View App' button become visible. Use this button to review the live result before applying the merge.

After the merge is complete the deploy staging job will be activated. This will deploy to staging environment which you can check in Deployments/Environments menu.
