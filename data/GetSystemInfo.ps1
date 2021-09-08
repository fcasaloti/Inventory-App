#getting system information
$computerProc = Get-WmiObject Win32_Processor | Select-Object -ExpandProperty Name
$check = $computerProc.GetTypeCode()
if($check -ne 'String'){$computerProc = '-'}

$computerMem = Get-WmiObject -Class Win32_ComputerSystem | Select-Object -ExpandProperty TotalPhysicalMemory
$check = $computerMem.GetTypeCode()
if($check -ne 'UInt64'){$computerMem = '0'}

Function Detect-Laptop
{
$isLaptop = $false
#The chassis is the physical container that houses the components of a computer. Check if the machine’s chasis type is 9.Laptop 10.Notebook 14.Sub-Notebook
if(Get-WmiObject -Class win32_systemenclosure | Where-Object { $_.chassistypes -eq 9 -or $_.chassistypes -eq 10 -or $_.chassistypes -eq 14})
{ $isLaptop = $true }
#Shows battery status , if true then the machine is a laptop.
if(Get-WmiObject -Class win32_battery)
{ $isLaptop = $true }
$isLaptop
}
If(Detect-Laptop) { $computerType = 'laptop' }
else { $computerType = 'desktop'  }

$computerModel = Get-WmiObject -Class:Win32_ComputerSystem | Select-Object -ExpandProperty Model
$check = $computerModel.GetTypeCode()
if($check -ne 'String'){$computerModel = '-'}

$computerSerial = Get-WmiObject win32_bios |Select-Object -ExpandProperty SerialNumber
$check = $computerModel.GetTypeCode()
if($check -ne 'String'){$computerModel = '-'}

$computerIP = $env:HostIP = (
    Get-NetIPConfiguration |
    Where-Object {
        $_.IPv4DefaultGateway -ne $null -and
        $_.NetAdapter.Status -ne "Disconnected"
    }
).IPv4Address.IPAddress
$check = $computerIP.GetTypeCode()
if($check -ne 'String'){$computerIP = '-'}

$computerBrand = Get-WmiObject -Class Win32_ComputerSystem | Select-Object -ExpandProperty Manufacturer
$check = $computerBrand.GetTypeCode()
if($check -ne 'String'){$computerBrand = '-'}

$computerOS = Get-WmiObject -class Win32_OperatingSystem | select -ExpandProperty Caption
$check = $computerOS.GetTypeCode()
if($check -ne 'String'){$computerOS = '-'}                           

$computerOSVersion = Get-WmiObject -class Win32_OperatingSystem | select -ExpandProperty Version
$check = $computerOSVersion.GetTypeCode()
if($check -ne 'String'){$computerOSVersion = '-'}    

$computerOSArc = Get-WmiObject -class Win32_OperatingSystem | select -ExpandProperty OSArchitecture
$check = $computerOSArc.GetTypeCode()
if($check -ne 'String'){$computerOSArc = '-'}  

$computerOSType = Get-WmiObject SoftwareLicensingProduct | Where-Object { $_.Name -Match 'Windows*' -and $_.LicenseStatus -eq 1 } | Select-Object -ExpandProperty Description
$computerOSType = $computerOSType.Split(",")
$computerOSType = $computerOSType[1].Trim()
$check = $computerOSType.GetTypeCode()
if($check -ne 'String'){$computerOSType = '-'}  

$computerHDModel = Get-Disk | Select-Object -ExpandProperty Model
if ($computerHDModel -is [array]){
$computerHDModel = $computerHDModel[0]
}
$check = $computerHDModel.GetTypeCode()
if($check -ne 'String'){$computerHDModel = '-'} 

$computerHDSize = Get-Disk | Select-Object -ExpandProperty Size
if ($computerHDSize -is [array]){
$computerHDSize = $computerHDSize[0]
}
$check = $computerHDSize.GetTypeCode()
if($check -ne 'UInt64'){$computerHDSize = '0'} 


$networkMappings = Get-CimInstance -Class Win32_NetworkConnection
$netMappings = ""


foreach($map in $networkMappings){

    $netMappings += $map | Select-Object -ExpandProperty LocalName
    $netMappings += $map | Select-Object -ExpandProperty RemoteName
    $netMappings += "|"

}

$computerAntivirus = Get-MpComputerStatus | Select-Object -ExpandProperty Antivirusenabled
$check = $computerAntivirus.GetTypeCode()
if($check -ne 'Boolean'){$computerAntivirus = 'false'} 

$report = New-Object psobject
$report | Add-Member -MemberType NoteProperty -name computerProc -Value $computerProc
$report | Add-Member -MemberType NoteProperty -name computerMem -Value $computerMem
$report | Add-Member -MemberType NoteProperty -name computerHostname -Value $env:computername
$report | Add-Member -MemberType NoteProperty -name computerType -Value $computerType
$report | Add-Member -MemberType NoteProperty -name computerIp -Value $computerIP
$report | Add-Member -MemberType NoteProperty -name computerModel -Value $computerModel
$report | Add-Member -MemberType NoteProperty -name computerSerial -Value $computerSerial
$report | Add-Member -MemberType NoteProperty -name computerAntivirus -Value $computerAntivirus    
$report | Add-Member -MemberType NoteProperty -name computerBrand -Value $computerBrand
$report | Add-Member -MemberType NoteProperty -name computerOS -Value $computerOS
$report | Add-Member -MemberType NoteProperty -name computerOSVersion -Value $computerOSVersion
$report | Add-Member -MemberType NoteProperty -name computerOSArc -Value $computerOSArc
$report | Add-Member -MemberType NoteProperty -name computerOSType -Value $computerOSType
$report | Add-Member -MemberType NoteProperty -name computerHDModel -Value $computerHDModel
$report | Add-Member -MemberType NoteProperty -name computerHDSize -Value $computerHDSize
$report | Add-Member -MemberType NoteProperty -name computerNetMap -Value $netMappings

$report | export-csv ~\$computerSerial-HW.csv -NoTypeInformation

#getting software information

function Get-InstalledSoftware {
    <#
	.SYNOPSIS
		Retrieves a list of all software installed on a Windows computer.
	.EXAMPLE
		PS> Get-InstalledSoftware
		
		This example retrieves all software installed on the local computer.
	.PARAMETER ComputerName
		If querying a remote computer, use the computer name here.
	
	.PARAMETER Name
		The software title you'd like to limit the query to.
	
	.PARAMETER Guid
		The software GUID you'e like to limit the query to
	#>
    [CmdletBinding()]
    param (
		
        [Parameter()]
        [ValidateNotNullOrEmpty()]
        [string]$ComputerName = $env:COMPUTERNAME,
		
        [Parameter()]
        [ValidateNotNullOrEmpty()]
        [string]$Name,
		
        [Parameter()]
        [guid]$Guid
    )
    process {
        try {
        #defining path for the file
        $outputFile = "~\$computerSerial-SW.csv";
        #check if file exist, if yes, delete it
        if(Test-Path -Path $outputFile -PathType Leaf){
            Remove-Item $outputFile
        } 
        #creating the file and adding the header for the file
        Add-Content $outputFile "Name,Version,Vendor";

            $scriptBlock = {
                $args[0].GetEnumerator() | ForEach-Object { New-Variable -Name $_.Key -Value $_.Value }
				
                $UninstallKeys = @(
                    "HKLM:\Software\Microsoft\Windows\CurrentVersion\Uninstall",
                    "HKLM:\SOFTWARE\Wow6432Node\Microsoft\Windows\CurrentVersion\Uninstall"
                )
                New-PSDrive -Name HKU -PSProvider Registry -Root Registry::HKEY_USERS | Out-Null
                $UninstallKeys += Get-ChildItem HKU: | where { $_.Name -match 'S-\d-\d+-(\d+-){1,14}\d+$' } | foreach {
                    "HKU:\$($_.PSChildName)\Software\Microsoft\Windows\CurrentVersion\Uninstall"
                }
                if (-not $UninstallKeys) {
                    Write-Warning -Message 'No software registry keys found'
                } else {
                    foreach ($UninstallKey in $UninstallKeys) {
                        $friendlyNames = @{
                            'DisplayName'    = 'Name'
                            'DisplayVersion' = 'Version'
                        }
                        Write-Verbose -Message "Checking uninstall key [$($UninstallKey)]"
                        if ($Name) {
                            $WhereBlock = { $_.GetValue('DisplayName') -like "$Name*" }
                        } elseif ($GUID) {
                            $WhereBlock = { $_.PsChildName -eq $Guid.Guid }
                        } else {
                            $WhereBlock = { $_.GetValue('DisplayName') }
                        }
                        $SwKeys = Get-ChildItem -Path $UninstallKey -ErrorAction SilentlyContinue | Where-Object $WhereBlock
                        if (-not $SwKeys) {
                            Write-Verbose -Message "No software keys in uninstall key $UninstallKey"
                        } else {
                            foreach ($SwKey in $SwKeys) {
                                $output = @{ }
                                foreach ($ValName in $SwKey.GetValueNames()) {
                                    if ($ValName -ne 'Version') {
                                        $output.InstallLocation = ''
                                        if ($ValName -eq 'InstallLocation' -and 
                                            ($SwKey.GetValue($ValName)) -and 
                                            (@('C:', 'C:\Windows', 'C:\Windows\System32', 'C:\Windows\SysWOW64') -notcontains $SwKey.GetValue($ValName).TrimEnd('\'))) {
                                            $output.InstallLocation = $SwKey.GetValue($ValName).TrimEnd('\')
                                        }
                                        [string]$ValData = $SwKey.GetValue($ValName)
                                        if ($friendlyNames[$ValName]) {
                                            $output[$friendlyNames[$ValName]] = $ValData.Trim() ## Some registry values have trailing spaces.
                                        } else {
                                            $output[$ValName] = $ValData.Trim() ## Some registry values trailing spaces
                                        }
                                    }
                                }
                                $output.GUID = ''
                                if ($SwKey.PSChildName -match '\b[A-F0-9]{8}(?:-[A-F0-9]{4}){3}-[A-F0-9]{12}\b') {
                                    $output.GUID = $SwKey.PSChildName
                                }
                                #getting softwares name, version, and Vendor (Publisher) and adding to the file
                                $swName = $output['Name']
                                $swVersion = $output['Version']
                                $swVendor = $output['Publisher']
                                Add-Content $outputFile "$swName,$swVersion,$swVendor"


                            }
                        }

                    }
                }
            }

            if ($ComputerName -eq $env:COMPUTERNAME) {
                & $scriptBlock $PSBoundParameters
            } else {
                Invoke-Command -ComputerName $ComputerName -ScriptBlock $scriptBlock -ArgumentList $PSBoundParameters
            }
        } catch {
            Write-Error -Message "Error: $($_.Exception.Message) - Line Number: $($_.InvocationInfo.ScriptLineNumber)"
        }
    }
}
 
#calling function
Get-InstalledSoftware

#open file explorer on files location
Start $env:USERPROFILE

#open license type popup
slmgr -dli