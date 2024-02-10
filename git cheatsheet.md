# Git Cheatsheet
## Here's how to add to our git repository
1. Fork our repository.
1. Clone your forked repository on your computer:
	```
	git clone https://github.com/<your username without the arrows>/cs386.git
	```
1. Create a branch so you can start working:
	```
	git checkout -b <name of your branch here>
	```
1. Now, you can edit you whatever you like!
1. When you're done, we have to stage your changes. Make sure you are in your created branch from 	step 3 (```git checkout <name of your branch>```).

	Now you can stage your changes:
	```
	git add <name of file changed>
	```
	to add one file's changes
	or
	```
	git add -a
	``` 
	to add all changes.
1. Now, we commit:

	```
	git commit -m "<commit message and/or what issue it fixes>"
	```
1. Switch to your main branch

	```
	git checkout main
	```
1. Merge your branch to main

	```
	git merge <name of your branch>
	```
1. Now we push.
	```
	git push -u origin main
	```
1. Okay, if it worked, go to your forked repository  on github. Click the contribute button. And create a pull request for your changes. You or another member can approve of the pull request and you're done!