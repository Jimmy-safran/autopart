# -------------------------------------------------------------------
# cleanup-vendor.ps1
#
# Recursively delete “tests”, “Tests”, “doc”, “docs”, “example”, etc.
# Also delete README*, CHANGELOG* and any *.md / *.rst files.
# -------------------------------------------------------------------

param (
    [string] $vendorPath = "$(Split-Path -Parent $MyInvocation.MyCommand.Path)\vendor"
)

Write-Host "Pruning non-essential files from: $vendorPath" -ForegroundColor Green

# 1) Remove any “tests”, “Tests”, or “test” directories:
Get-ChildItem -Path $vendorPath -Recurse -Directory |
    Where-Object { $_.Name -match '^(tests|Tests|test)$' } |
    ForEach-Object { Remove-Item $_.FullName -Recurse -Force -ErrorAction SilentlyContinue }

# 2) Remove “doc”, “docs”, or “documentation” directories:
Get-ChildItem -Path $vendorPath -Recurse -Directory |
    Where-Object { $_.Name -match '^(doc|docs|documentation)$' } |
    ForEach-Object { Remove-Item $_.FullName -Recurse -Force -ErrorAction SilentlyContinue }

# 3) Remove “examples”, “example”, “bench”, “benchmark” folders:
Get-ChildItem -Path $vendorPath -Recurse -Directory |
    Where-Object { $_.Name -match '^(examples|example|bench|benchmark)$' } |
    ForEach-Object { Remove-Item $_.FullName -Recurse -Force -ErrorAction SilentlyContinue }

# 4) Remove any markdown/rst/changelog files (optional):
Get-ChildItem -Path $vendorPath -Recurse -Include *.md,*.rst,CHANGELOG*,README* -File |
    ForEach-Object { Remove-Item $_.FullName -Force -ErrorAction SilentlyContinue }

# 5) Remove any “.git” directories if a dist ZIP fell back to a Git‐clone:
Get-ChildItem -Path $vendorPath -Recurse -Directory |
    Where-Object { $_.Name -eq '.git' } |
    ForEach-Object { Remove-Item $_.FullName -Recurse -Force -ErrorAction SilentlyContinue }

Write-Host "Pruning complete." -ForegroundColor Green
