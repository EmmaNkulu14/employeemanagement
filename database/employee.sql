USE [master]
GO
/****** Object:  Database [employee]    Script Date: 02-Nov-20 01:37:57 PM ******/
CREATE DATABASE [employee]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'employee', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\employee.mdf' , SIZE = 61440KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'employee_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\employee_log.ldf' , SIZE = 61440KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [employee] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [employee].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [employee] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [employee] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [employee] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [employee] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [employee] SET ARITHABORT OFF 
GO
ALTER DATABASE [employee] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [employee] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [employee] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [employee] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [employee] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [employee] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [employee] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [employee] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [employee] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [employee] SET  DISABLE_BROKER 
GO
ALTER DATABASE [employee] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [employee] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [employee] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [employee] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [employee] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [employee] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [employee] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [employee] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [employee] SET  MULTI_USER 
GO
ALTER DATABASE [employee] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [employee] SET DB_CHAINING OFF 
GO
ALTER DATABASE [employee] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [employee] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [employee] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [employee] SET QUERY_STORE = OFF
GO
USE [employee]
GO
/****** Object:  Table [dbo].[cities]    Script Date: 02-Nov-20 01:37:57 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cities](
	[id_city] [int] NOT NULL,
	[id_country] [int] NOT NULL,
	[city_name] [varchar](50) NOT NULL,
 CONSTRAINT [PK_cities] PRIMARY KEY CLUSTERED 
(
	[id_city] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[client]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[client](
	[id_client] [int] NOT NULL,
	[id_city] [int] NOT NULL,
	[client_name] [varchar](50) NOT NULL,
	[client_lname] [varchar](50) NOT NULL,
	[client_phone] [varchar](20) NOT NULL,
	[manager_email] [varchar](50) NOT NULL,
	[employee_address] [varchar](50) NOT NULL,
	[client_description] [text] NOT NULL,
 CONSTRAINT [PK_client] PRIMARY KEY CLUSTERED 
(
	[id_client] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[countries]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[countries](
	[id_country] [int] NOT NULL,
	[country_name] [varchar](50) NOT NULL,
	[cuntry_capital] [varchar](50) NOT NULL,
	[country_population] [varchar](50) NOT NULL,
 CONSTRAINT [PK_countries] PRIMARY KEY CLUSTERED 
(
	[id_country] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[department]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[department](
	[departement_id] [int] NOT NULL,
	[departement_name] [varchar](50) NOT NULL,
	[departement_phone] [varchar](50) NOT NULL,
	[departement_email] [varchar](50) NOT NULL,
 CONSTRAINT [PK_department] PRIMARY KEY CLUSTERED 
(
	[departement_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[employee]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[employee](
	[id_employee] [int] NOT NULL,
	[departement_id] [int] NOT NULL,
	[employee_name] [varchar](50) NOT NULL,
	[employee_lname] [varchar](50) NOT NULL,
	[employee_grade] [varchar](50) NOT NULL,
	[employee_date_of_birth] [date] NOT NULL,
	[employee_phone_num] [varchar](50) NOT NULL,
	[project_start_date] [date] NOT NULL,
	[manager_email] [varchar](50) NOT NULL,
	[employee_address] [varchar](50) NOT NULL,
 CONSTRAINT [PK_employee] PRIMARY KEY CLUSTERED 
(
	[id_employee] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[manager]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[manager](
	[id_manager] [int] NOT NULL,
	[manager_name] [varchar](50) NOT NULL,
	[manager_email] [varchar](50) NOT NULL,
	[manager_phone_number] [varchar](15) NOT NULL,
 CONSTRAINT [PK_manager] PRIMARY KEY CLUSTERED 
(
	[id_manager] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[manager_project]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[manager_project](
	[id_project_manager] [int] NOT NULL,
	[id_manager] [int] NOT NULL,
	[id_project] [int] NOT NULL,
	[part_of_manager] [varchar](150) NOT NULL,
	[project_description_manager] [text] NOT NULL,
	[project_status] [varchar](50) NOT NULL,
	[project_start_date] [date] NOT NULL,
	[project_end_date] [date] NOT NULL,
 CONSTRAINT [PK_manager_project] PRIMARY KEY CLUSTERED 
(
	[id_project_manager] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[part_of_job]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[part_of_job](
	[project_id] [int] NOT NULL,
	[id_project_manager] [int] NOT NULL,
	[id_employee] [int] NOT NULL,
	[starting_date] [date] NOT NULL,
	[task] [varchar](50) NOT NULL,
	[status_of_project] [varchar](50) NOT NULL,
	[date_of_end] [date] NOT NULL,
 CONSTRAINT [PK_part_of_job] PRIMARY KEY CLUSTERED 
(
	[project_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[project]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[project](
	[id_project] [int] NOT NULL,
	[id_type] [int] NOT NULL,
	[id_client] [int] NOT NULL,
	[project_name] [varchar](50) NOT NULL,
	[date_of_issue] [date] NULL,
	[project_description_manager] [text] NOT NULL,
 CONSTRAINT [PK_project] PRIMARY KEY CLUSTERED 
(
	[id_project] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[time_sheet]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[time_sheet](
	[id_time] [int] NOT NULL,
	[project_id] [int] NOT NULL,
	[starting_time] [time](7) NOT NULL,
	[ending_time] [time](7) NOT NULL,
	[part_of_task] [varchar](150) NOT NULL,
	[date] [date] NULL,
 CONSTRAINT [PK_time_sheet] PRIMARY KEY CLUSTERED 
(
	[id_time] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[type_of_project]    Script Date: 02-Nov-20 01:37:58 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[type_of_project](
	[id_type] [int] NOT NULL,
	[type_name] [varchar](50) NOT NULL,
 CONSTRAINT [PK_type_of_project] PRIMARY KEY CLUSTERED 
(
	[id_type] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (11, 1, N'grodno')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (22, 1, N'vitebsk')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (23, 2, N'st petersburg')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (24, 2, N'krasnodar')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (25, 3, N'gdansk')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (26, 3, N'byelastok')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (27, 4, N'odesa')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (28, 4, N'donetsk')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (29, 4, N'luhansk')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (30, 5, N'tartu')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (31, 5, N'valga')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (32, 5, N'narva')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (33, 6, N'munich')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (34, 6, N'augsburg')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (35, 7, N'ankara')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (36, 8, N'barcelona')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (37, 8, N'sevilla')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (38, 9, N'venise')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (39, 9, N'milan')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (40, 10, N'porto')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (41, 11, N'hangzou')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (42, 12, N'bangalore')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (43, 13, N'marseille')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (44, 14, N'manchester')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (45, 15, N'las vegas')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (46, 16, N'montreal')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (47, 18, N'cevis')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (48, 17, N'palanga')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (49, 19, N'eger')
INSERT [dbo].[cities] ([id_city], [id_country], [city_name]) VALUES (50, 20, N'sombor')
GO
INSERT [dbo].[client] ([id_client], [id_city], [client_name], [client_lname], [client_phone], [manager_email], [employee_address], [client_description]) VALUES (1, 11, N'patrick', N'mike', N'+35858888888', N'arthur@gmail.com', N'15 thomas street', N'a')
INSERT [dbo].[client] ([id_client], [id_city], [client_name], [client_lname], [client_phone], [manager_email], [employee_address], [client_description]) VALUES (2, 22, N'yannick', N'nelson', N'+356949495990', N'nath@gmail.com', N'16 harley street', N'v')
INSERT [dbo].[client] ([id_client], [id_city], [client_name], [client_lname], [client_phone], [manager_email], [employee_address], [client_description]) VALUES (3, 42, N'nick', N'kat', N'+848441518944', N'nath@gmail.com', N'304A st louis street', N'c')
INSERT [dbo].[client] ([id_client], [id_city], [client_name], [client_lname], [client_phone], [manager_email], [employee_address], [client_description]) VALUES (4, 29, N'obed', N'kent', N'+448589599599', N'tony1@gmail.com', N'28 harvard street', N'e')
INSERT [dbo].[client] ([id_client], [id_city], [client_name], [client_lname], [client_phone], [manager_email], [employee_address], [client_description]) VALUES (5, 31, N'davina', N'kot', N'+688558989989', N'tony1@gmail.com', N'352 kentuky street', N'd')
INSERT [dbo].[client] ([id_client], [id_city], [client_name], [client_lname], [client_phone], [manager_email], [employee_address], [client_description]) VALUES (6, 38, N'elgah', N'brune', N'+45229898989', N'hugues@gmail.com', N'2 faustine street', N'j')
GO
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (1, N'Belarus', N'Minsk', N'5622222')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (2, N'Russia', N'Moscow', N'5000000')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (3, N'poland', N'warsaw', N'12000000')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (4, N'ukraine', N'kiev', N'452255255')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (5, N'estonia', N'talin', N'333333')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (6, N'germany', N'berlin', N'154848488')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (7, N'turkey', N'istanbul', N'1519898484')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (8, N'spain', N'madrid', N'1161198984')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (9, N'italia', N'rome', N'1548484')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (10, N'portugal', N'lisbon', N'16445884')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (11, N'china', N'beijing', N'16999999999')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (12, N'india', N'new dehli', N'599999994955')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (13, N'france', N'paris', N'600000')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (14, N'england', N'london', N'65656556')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (15, N'usa', N'washington', N'495959599')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (16, N'canada', N'toronto', N'44115515')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (17, N'lithunia', N'vilnius', N'1122222')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (18, N'latvia', N'riga', N'2626595')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (19, N'hungary', N'budapest', N'265588')
INSERT [dbo].[countries] ([id_country], [country_name], [cuntry_capital], [country_population]) VALUES (20, N'serbia', N'belgarde', N'1122022')
GO
INSERT [dbo].[department] ([departement_id], [departement_name], [departement_phone], [departement_email]) VALUES (1, N'accounting department', N'+7888595597', N'account@gmail.com')
INSERT [dbo].[department] ([departement_id], [departement_name], [departement_phone], [departement_email]) VALUES (2, N'Marketing department', N'+1544989988', N'Marketingdepartment@gmail.com')
INSERT [dbo].[department] ([departement_id], [departement_name], [departement_phone], [departement_email]) VALUES (3, N'IT department', N'+3787548795', N'ITdepartment@gmail.com')
INSERT [dbo].[department] ([departement_id], [departement_name], [departement_phone], [departement_email]) VALUES (4, N'service department', N'+697989897', N'servicedepartment@gmail.com')
INSERT [dbo].[department] ([departement_id], [departement_name], [departement_phone], [departement_email]) VALUES (5, N'Research and Developmen', N'+3599988988', N'Research@gmail.com')
GO
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (1, 2, N'tony', N'kaz', N'master,and phd', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (2, 5, N'yves', N'kroos', N'bachelor degree', CAST(N'1987-10-12' AS Date), N'+559848488', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (3, 1, N'steny', N'campeutch', N'bachelor degree', CAST(N'1993-05-29' AS Date), N'+578887448', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (4, 3, N'caleb', N'lom', N'bachelor degree', CAST(N'1995-11-24' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (5, 5, N'theo', N'loic', N'bachelor degree', CAST(N'1976-10-01' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (6, 4, N'jenny', N'parker', N'bachelor degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (7, 2, N'serena', N'william', N'master,and phd', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (8, 1, N'raphael', N'jovic', N'bachelor,master degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (9, 3, N'daryl', N'meyrose', N'master,and phd', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (10, 3, N'clark', N'mila', N'bachelor,master degree', CAST(N'1981-09-23' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (11, 4, N'sandra', N'tiny', N'bachelor degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (12, 5, N'thesi', N'cristina', N'bachelor degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (13, 2, N'alex', N'vlad', N'bachelor degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (14, 1, N'william', N'gab', N'bachelor degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
INSERT [dbo].[employee] ([id_employee], [departement_id], [employee_name], [employee_lname], [employee_grade], [employee_date_of_birth], [employee_phone_num], [project_start_date], [manager_email], [employee_address]) VALUES (15, 5, N'jules', N'kab', N'bachelor,master degree', CAST(N'1987-10-12' AS Date), N'+599498989', CAST(N'2020-02-10' AS Date), N'tony1@gmail.com', N'85 thoms will street ')
GO
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (1, N'thom', N'thom@gmail.com', N'+75206515181')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (2, N'chris', N'chris@gmail.com', N'+75203268989')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (3, N'arthur', N'arthur@gmail.com', N'+75204968785')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (4, N'nath', N'nath@gmail.com', N'+37589525189')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (5, N'jonathan', N'jonathan@gmail.com', N'+37525418748')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (6, N'tony', N'tony1@gmail.com', N'+78582221288')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (7, N'igor', N'igor@gmail.com', N'+35785299295')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (8, N'franck', N'franck@gmail.com', N'+32589548992')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (9, N'chelly', N'chelly@gmail.com', N'+56989897895')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (10, N'hugues', N'hugues@gmail.com', N'+36995888592')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (11, N'leo', N'leo@gmail.com', N'+66569898565')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (12, N'daryl', N'daryl@gmail.com', N'+35448489499')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (13, N'giresse', N'giresse@gmail.com', N'+51164894848')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (14, N'bob', N'bob@gmail.com', N'+48898895699')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (15, N'alice', N'alice@gmail.com', N'+51849446944')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (16, N'camille', N'camille@gmail.com', N'+65358688989')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (17, N'gims', N'gims@gmail.com', N'+68989891665')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (18, N'karis', N'karis@gmail.com', N'+14569589655')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (19, N'victor', N'victor@gmail.com', N'+23569889988')
INSERT [dbo].[manager] ([id_manager], [manager_name], [manager_email], [manager_phone_number]) VALUES (20, N'serge', N'serge@gmail.com', N'+36654962599')
GO
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (1, 1, 1, N'Manage and ensure the  work', N'make the product popular on the market', N'not done', CAST(N'2019-07-14' AS Date), CAST(N'2019-07-14' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (2, 8, 3, N'develop a web application', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (3, 2, 4, N'Make a logo ', N'design logo fort a company', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (4, 4, 2, N'Design images', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (5, 7, 1, N'Manage and ensure the  work', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (6, 3, 3, N'develop a web application', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (7, 5, 2, N'Design shirts ', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (8, 6, 1, N'Manage and ensure the  work', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
INSERT [dbo].[manager_project] ([id_project_manager], [id_manager], [id_project], [part_of_manager], [project_description_manager], [project_status], [project_start_date], [project_end_date]) VALUES (9, 1, 3, N'develop a web application', N'conduct the team on the development of he project', N'not done', CAST(N'2020-07-28' AS Date), CAST(N'2020-07-28' AS Date))
GO
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (1, 2, 3, CAST(N'2020-07-28' AS Date), N'working on the design of logo', N'not done', CAST(N'2020-07-31' AS Date))
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (2, 1, 5, CAST(N'2020-02-13' AS Date), N'working on the design of logo', N'done', CAST(N'2020-05-22' AS Date))
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (3, 3, 1, CAST(N'2020-07-28' AS Date), N'working on the design of logo', N'not done', CAST(N'2020-08-03' AS Date))
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (4, 1, 3, CAST(N'2020-10-06' AS Date), N'working on the design of logo', N'not done', CAST(N'2020-10-15' AS Date))
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (5, 4, 2, CAST(N'2020-01-14' AS Date), N'working on the design of logo', N'done', CAST(N'2020-06-03' AS Date))
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (6, 5, 1, CAST(N'2020-08-01' AS Date), N'working on the design of logo', N'not done', CAST(N'2020-09-17' AS Date))
INSERT [dbo].[part_of_job] ([project_id], [id_project_manager], [id_employee], [starting_date], [task], [status_of_project], [date_of_end]) VALUES (7, 6, 6, CAST(N'2020-03-18' AS Date), N'working on the development of web app', N'done', CAST(N'2020-04-24' AS Date))
GO
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (1, 1, 1, N'promote product', CAST(N'2019-07-14' AS Date), N'make the product more popular')
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (2, 2, 5, N'Construction of a house', CAST(N'2020-02-13' AS Date), N'constuct house ')
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (3, 3, 2, N'develop a web application', CAST(N'2020-07-28' AS Date), N'develop web application for online shopping')
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (4, 1, 3, N'promote product', CAST(N'2020-10-06' AS Date), N'make the product more popular')
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (5, 3, 6, N'promote product', CAST(N'2020-01-14' AS Date), N'make the product more popular')
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (6, 1, 4, N'develop application', CAST(N'2020-08-01' AS Date), N'develop application')
INSERT [dbo].[project] ([id_project], [id_type], [id_client], [project_name], [date_of_issue], [project_description_manager]) VALUES (7, 2, 1, N'promote product', CAST(N'2020-03-18' AS Date), N'make the product more popular')
GO
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (1, 2, CAST(N'08:30:00' AS Time), CAST(N'16:30:00' AS Time), N'work ', CAST(N'2020-10-01' AS Date))
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (2, 5, CAST(N'08:10:00' AS Time), CAST(N'17:00:00' AS Time), N'testing', CAST(N'2020-10-02' AS Date))
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (3, 1, CAST(N'10:00:00' AS Time), CAST(N'16:00:00' AS Time), N'designing', CAST(N'2020-10-03' AS Date))
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (4, 5, CAST(N'10:00:00' AS Time), CAST(N'16:00:00' AS Time), N'testing', CAST(N'2020-10-04' AS Date))
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (5, 4, CAST(N'10:00:00' AS Time), CAST(N'16:00:00' AS Time), N'analyzing', CAST(N'2020-10-05' AS Date))
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (6, 1, CAST(N'10:00:00' AS Time), CAST(N'16:00:00' AS Time), N'analyzing', CAST(N'2020-10-06' AS Date))
INSERT [dbo].[time_sheet] ([id_time], [project_id], [starting_time], [ending_time], [part_of_task], [date]) VALUES (7, 3, CAST(N'08:00:00' AS Time), CAST(N'16:00:00' AS Time), N'analyzing', CAST(N'2020-10-07' AS Date))
GO
INSERT [dbo].[type_of_project] ([id_type], [type_name]) VALUES (1, N'Marketing')
INSERT [dbo].[type_of_project] ([id_type], [type_name]) VALUES (2, N'Consturction project')
INSERT [dbo].[type_of_project] ([id_type], [type_name]) VALUES (3, N'IT')
INSERT [dbo].[type_of_project] ([id_type], [type_name]) VALUES (4, N'Design and Digitals')
GO
ALTER TABLE [dbo].[cities]  WITH CHECK ADD  CONSTRAINT [FK_cities_countries] FOREIGN KEY([id_country])
REFERENCES [dbo].[countries] ([id_country])
GO
ALTER TABLE [dbo].[cities] CHECK CONSTRAINT [FK_cities_countries]
GO
ALTER TABLE [dbo].[client]  WITH CHECK ADD  CONSTRAINT [FK_client_cities] FOREIGN KEY([id_city])
REFERENCES [dbo].[cities] ([id_city])
GO
ALTER TABLE [dbo].[client] CHECK CONSTRAINT [FK_client_cities]
GO
ALTER TABLE [dbo].[employee]  WITH CHECK ADD  CONSTRAINT [FK_employee_department] FOREIGN KEY([departement_id])
REFERENCES [dbo].[department] ([departement_id])
GO
ALTER TABLE [dbo].[employee] CHECK CONSTRAINT [FK_employee_department]
GO
ALTER TABLE [dbo].[manager_project]  WITH CHECK ADD  CONSTRAINT [FK_manager_project_manager] FOREIGN KEY([id_manager])
REFERENCES [dbo].[manager] ([id_manager])
GO
ALTER TABLE [dbo].[manager_project] CHECK CONSTRAINT [FK_manager_project_manager]
GO
ALTER TABLE [dbo].[manager_project]  WITH CHECK ADD  CONSTRAINT [FK_manager_project_project] FOREIGN KEY([id_project])
REFERENCES [dbo].[project] ([id_project])
GO
ALTER TABLE [dbo].[manager_project] CHECK CONSTRAINT [FK_manager_project_project]
GO
ALTER TABLE [dbo].[part_of_job]  WITH CHECK ADD  CONSTRAINT [FK_part_of_job_employee] FOREIGN KEY([id_employee])
REFERENCES [dbo].[employee] ([id_employee])
GO
ALTER TABLE [dbo].[part_of_job] CHECK CONSTRAINT [FK_part_of_job_employee]
GO
ALTER TABLE [dbo].[part_of_job]  WITH CHECK ADD  CONSTRAINT [FK_part_of_job_manager_project] FOREIGN KEY([id_project_manager])
REFERENCES [dbo].[manager_project] ([id_project_manager])
GO
ALTER TABLE [dbo].[part_of_job] CHECK CONSTRAINT [FK_part_of_job_manager_project]
GO
ALTER TABLE [dbo].[project]  WITH CHECK ADD  CONSTRAINT [FK_project_client] FOREIGN KEY([id_client])
REFERENCES [dbo].[client] ([id_client])
GO
ALTER TABLE [dbo].[project] CHECK CONSTRAINT [FK_project_client]
GO
ALTER TABLE [dbo].[project]  WITH CHECK ADD  CONSTRAINT [FK_project_type_of_project] FOREIGN KEY([id_type])
REFERENCES [dbo].[type_of_project] ([id_type])
GO
ALTER TABLE [dbo].[project] CHECK CONSTRAINT [FK_project_type_of_project]
GO
ALTER TABLE [dbo].[time_sheet]  WITH CHECK ADD  CONSTRAINT [FK_time_sheet_part_of_job] FOREIGN KEY([project_id])
REFERENCES [dbo].[part_of_job] ([project_id])
GO
ALTER TABLE [dbo].[time_sheet] CHECK CONSTRAINT [FK_time_sheet_part_of_job]
GO
USE [master]
GO
ALTER DATABASE [employee] SET  READ_WRITE 
GO
