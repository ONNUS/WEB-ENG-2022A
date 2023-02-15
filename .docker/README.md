# [ Docker Compose ]

This repository contains scripts to manage Docker containers using either Linux bash or Windows PowerShell.

## Linux Bash Commands

### Start the Linux Docker containers
```bash
bash .docker/linux/start.sh 
```
or
```bash
bash .docker/linux/start-debug.sh 
```

### Stop the Linux Docker containers
```bash
bash .docker/linux/stop.sh 
```

### Reset the Linux Docker containers
```bash
bash .docker/linux/reset.sh 
```

---

## Windows PowerShell Commands

### Start the Windows Docker containers
```powershell
.\.docker\windows\start.bat
```
or
```powershell
.\.docker\windows\start-debug.bat
```

### Stop the Windows Docker containers
```powershell
.\.docker\windows\stop.bat
```

### Reset the Windows Docker containers
```powershell
.\.docker\windows\reset.bat
```