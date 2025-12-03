# Web Repository

## Getting Started

### eLlawliet       = Daniel Setiawan     5026231010
### Jek786          = Dzaky Ahmad         5026231184
### nabilashinta    = Nabila Shinta       5026231038
### chandiki        = Amandea Chandiki    5026231139
### 1harbima        = Harbima Razan       5026231225

### Jastip.in — Aplikasi Jasa Titip Makanan Asrama Mahasiswa ITS
Jastip.in adalah aplikasi jasa titip (jastip) makanan yang dikembangkan khusus untuk lingkungan asrama mahasiswa ITS. Aplikasi ini membantu mahasiswa yang tidak memiliki kendaraan, sedang sibuk, atau sekadar malas keluar untuk tetap bisa mendapatkan makanan dengan mudah dan cepat.

Pada proyek ini, aplikasi dibangun menggunakan POV (Point of View) Seller, sehingga fitur dan alur kerja berfokus pada pengalaman dan kebutuhan penjual/jastiper dalam menerima, mengelola, dan menyelesaikan pesanan.

### 1. Clone this Repo
Use bash or terminal to clone this repo
```
git clone https://github.com/ITS-International-Office-Volunteers/volun-web.git
```
### 2. Create work branch
To create a branch you can start by:
 - Click branches
 - Click new branches
 - Input your branches name `Recomended Format` ('Works number'-'What to do'---'where')
 - Choose master as source and click create branch
after that go to your terminal and use this command:
```
git fetch origin
git checkout branch name
```
## Pushing and merging
When you finish your job you can push and merge by doing this step:
### 1. Checking right branch
In your terminal type:
```
git branch
```
to make sure you are in your work branch
### 2. add, commit, push
Then you can start doing add, commit and push by using these command:
```
git add .
git commit -m "your message"
git push
```
**Pay attention to the "commit message convention" for your message**
### 3. Create a pull request
after you push you can press create & compare pull request or you can follow this step by step:
- Click pull request tab
- Click New pull request
- Choose Master as base and your branch as compare
- Click create pull request

## Check other branch
### 1. Fetching all branch
Open your terminal and go inside volun-web folder then use this command:
```
git pull origin master
git fetch origin
```
### 2. Checkout the branch
After Fetching all branch you can check branch you want by using this command:
```
git checkout [Name of branch]
```

## Commit Message Convention 
### Format
 
`<type>(optional scope): <description>`
Example: `feat(pre-event): add speakers section`
 
### 1. Type
 
Available types are:
 
- feat → Changes about addition or removal of a feature. Ex: `feat: add table on landing page`, `feat: remove table from landing page`
- fix → Bug fixing, followed by the bug. Ex: `fix: illustration overflows in mobile view`
- docs → Update documentation (README.md)
- style → Updating style, and not changing any logic in the code (reorder imports, fix whitespace, remove comments)
- chore → Installing new dependencies, or bumping deps
- refactor → Changes in code, same output, but different approach
- test → Update testing suite, cypress files
- revert → when reverting commits
- perf → Fixing something regarding performance (deriving state, using memo, callback)
- vercel → Blank commit to trigger vercel deployment. Ex: `vercel: trigger deployment`
 
### 2. Optional Scope
 
Labels per page Ex: `feat(pre-event): add date label`
 
\*If there is no scope needed, you don't need to write it
 
### 3. Description
 
Description must fully explain what is being done.
 
Add BREAKING CHANGE in the description if there is a significant change.
 
**If there are multiple changes, then commit one by one**
 
- After colon, there are a single space Ex: `feat: add something`
- When using `fix` type, state the issue Ex: `fix: file size limiter not working`
- Use imperative, and present tense: "change" not "changed" or "changes"
- Don't use capitals in front of the sentence
- Don't add full stop (.) at the end of the sentence
