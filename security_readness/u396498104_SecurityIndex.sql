-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2021 at 05:33 AM
-- Server version: 10.4.19-MariaDB-cll-lve
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u396498104_SecurityIndex`
--

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `factor_id` int(11) NOT NULL,
  `factor_name` varchar(255) NOT NULL,
  `weightage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`factor_id`, `factor_name`, `weightage`) VALUES
(1, 'INDIVIDUAL', 0.286),
(3, 'ORGANIZATION', 0.43),
(4, 'TECHNOLOGY', 0.286);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `title_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `title_id`) VALUES
(2, 'I familiar with function of software security system.', 1),
(3, 'I familiar with the guidance provide by my organization on software security interface during my work.', 1),
(4, 'I familiar the user interface elements of software security system.', 1),
(6, 'I trust our organization provides fast and accurate of software security information.', 2),
(7, 'I trust software security system in our organization is secured and safe.', 2),
(8, 'I feel confident that my organization provide a transparency software security that can be accessed quickly and easily.', 2),
(9, 'I familiar using software security system.', 1),
(10, 'I belief organization have high ability to protect our personal information.', 2),
(11, 'Does an Information security policy exist, which is approved by the management, published and communicated as appropriate to all employees?', 3),
(13, 'Does it state the management commitment and set out the organizational approach to managing information security?', 3),
(14, 'Does the Security policy have an owner, who is responsible for its maintenance and review according to a defined review process?', 4),
(15, 'Does the process ensure that a review takes place in response to any changes affecting the basis of the original assessment, example: significant security incidents, new vulnerabilities or changes to organizational or technical structure?', 4),
(16, 'Are responsibilities for the protection of individual assets and for carrying out specific security processes clearly defined?', 5),
(17, 'Are the appropriate contacts with law enforcement authorities, regulatory bodies, utility providers, information service providers and telecommunication operators maintained to ensure that appropriate action can be quickly taken and advice obtained, in the event of an incident?', 6),
(18, 'Is the implementation of security policy reviewed independently on regular basis? This is to provide assurance that organizational practices properly reflect the policy, and that it is feasible and effective.', 7),
(19, 'Are risks from third party access identified and appropriate security controls implemented?', 8),
(20, 'Are the types of accesses identified, classified and reasons for access justified?', 8),
(24, 'Is there a formal contract containing, or referring to, all the security requirements to ensure compliance with the organizations security policies and standards?', 9),
(25, 'Are security risks with third party contractors working onsite identified and appropriate controls implemented?', 8),
(26, 'Are security requirements addressed in the contract with the third party, when the organization has outsourced the management and control of all or some of its information systems, networks and/ or desktop environments?', 10),
(27, 'Does contract address how the legal requirements are to be met, how the security of the organizations assets are maintained and tested, and the right of audit, physical security issues and how the availability of the services is to be maintained in the event of disaster?', 10),
(28, 'Is there a maintained inventory or register of the important assets associated with each information system?', 11),
(29, 'Is there an Information classification scheme or guideline in place; which will assist in determining how the information is to be handled and protected?', 12),
(30, 'Is there an appropriate set of procedures defined for information labeling and handling in accordance with the classification scheme adopted by the organization?', 13),
(31, 'Are security roles and responsibilities as laid in Organization=s information security policy documented where appropriate?', 14),
(32, 'Does this include general responsibilities for implementing or maintaining security policy as well as specific responsibilities for protection of particular assets, or for extension of particular security processes or activities?', 14),
(33, 'Do employees sign Confidentiality or non-disclosure agreements as a part of their initial terms and conditions of the employment and annually thereafter?', 15),
(34, 'Does this agreement cover the security of the information processing facility and organization assets?', 15),
(35, 'Do the terms and conditions of the employment cover the employee=s responsibility for information security? Where appropriate, these responsibilities might continue for a defined period after the end of the employment.', 16),
(36, 'Do all employees of the organization and third party users (where relevant) receive appropriate Information Security training and regular updates in organizational policies and procedures?', 17),
(37, 'Does a formal reporting procedure exist, to report security/threat incidents through appropriate management channels as quickly as possible?', 18),
(38, 'Does a formal reporting procedure or guideline exist for users, to report security weakness in, or threats to, systems or services?', 19),
(39, 'Are items requiring special protection isolated to reduce the general level of protection required?', 20),
(40, 'Are controls adopted to minimize risk from potential threats such as theft, fire, explosives, smoke, water, dist, vibration, chemical effects, electrical supply interfaces, electromagnetic radiation and flood?', 20),
(41, 'Is the equipment protected from power failures by using redundant power supplies such as multiple feeds, uninterruptible power supply (ups), backup generator etc.?', 21),
(42, 'Is maintenance carried out only by authorized personnel?', 22),
(43, 'Is the equipment covered by insurance, and are the insurance requirements are satisfied?', 22),
(44, 'Does any equipment usage outside an organization=s premises for information processing have to be authorized by the management?', 23),
(45, 'Is the security provided for equipment while outside the premises equal to or more than the security provided inside the premises?', 23),
(46, 'Are storage devices containing sensitive information either physically destroyed or securely over written?', 24),
(47, 'Can equipment, information or software be taken offsite without appropriate authorization?', 25),
(48, 'Are spot checks or regular audits conducted to detect unauthorized removal of property?', 25),
(49, 'Are individuals aware of these types of spot checks or regular audits?', 25),
(50, 'Does the Security Policy identify any Operating procedures such as Back-up, Equipment maintenance etc.?', 26),
(51, 'Does an Incident Management procedure exist to handle security/threat incidents?', 27),
(52, 'Does the procedure address the incident management responsibilities, orderly and quick response to security/threat incidents?', 27),
(53, 'Does the procedure address different types of incidents ranging from denial of service to breach of confidentiality etc., and ways to handle them?', 27),
(54, 'Are the audit trails and logs relating to the incidents are maintained and proactive action taken in a way that the incident doesn’t reoccur?', 27),
(55, 'Are any of the Information processing facilities managed by an external company or contractor (third party)?', 28),
(56, 'Are the risks associated with such management identified in advance, discussed with the third party and appropriate controls incorporated into the contract?', 28),
(57, 'Is necessary approval obtained from business and application owners?', 28),
(58, 'Does a procedure exist for management of removable computer media such as tapes, disks, cassettes, memory cards and reports?', 29),
(59, 'Is there any formal or informal agreement between the organizations for exchange of information and software?', 30),
(60, 'Does the agreement address the security issues based on the sensitivity of the business information involved?', 30),
(61, 'Are there are any policies, procedures or controls in place to protect the exchange of information through the use of voice, facsimile and video communication facilities?', 31),
(62, 'Have the business requirements for access control been defined and documented?', 32),
(63, 'Does the Access control policy address the rules and rights for each user or a group of users?', 32),
(64, 'Are the users and service providers given a clear statement of the business requirement to be met by access controls?', 32),
(65, 'Has a formal policy been adopted that takes into account the risks of working with computing facilities such as notebooks, palmpilots etc., especially in unprotected environments?', 33),
(66, 'Was training arranged for staff that use mobile computing facilities to raise their awareness on the additional risks resulting from this way of working and controls that need to be implemented to mitigate the risks?', 33),
(67, 'Are there any policies, procedures and/ or standards to control telecommuting activities, this should be consistent with organization=s security policy?', 34),
(68, 'Is suitable protection of telecommuting site in place against threats such as theft of equipment, unauthorized disclosure of information etc.?', 34),
(69, 'Are responsibilities for the protection of individual assets and for carrying out specific security processes clearly defined?', 35),
(70, 'Are the appropriate contacts with law enforcement authorities, regulatory bodies, utility providers, information service providers and telecommunication operators maintained to ensure that appropriate action can be quickly taken and advice obtained, in the event of an incident?', 36),
(71, 'Is the implementation of security policy reviewed independently on regular basis? This is to provide assurance that organizational practices properly reflect the policy, and that it is feasible and effective.', 37),
(72, 'My organization software security is capable protect against malicious, attach and hacker efficiently.', 38),
(73, 'Software security system effective in keeping and protect the company data.', 38),
(74, 'My organization’s software security are error-free.', 38),
(76, 'My organization’s software security has adequate sufficient security for protect employee personal data. ', 38);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `value` varchar(6) NOT NULL,
  `answer` float NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `value`, `answer`, `question_id`, `user_id`) VALUES
(1537, 'Yes', 1, 2, 5),
(1538, 'Yes', 1, 3, 5),
(1539, 'No', 0, 4, 5),
(1540, 'No', 0, 9, 5),
(1541, 'No', 0, 6, 5),
(1542, 'No', 0, 7, 5),
(1543, 'No', 0, 8, 5),
(1544, 'No', 0, 10, 5),
(1545, 'No', 0, 11, 5),
(1546, 'No', 0, 13, 5),
(1547, 'No', 0, 14, 5),
(1548, 'No', 0, 15, 5),
(1549, 'No', 0, 16, 5),
(1550, 'No', 0, 17, 5),
(1551, 'No', 0, 18, 5),
(1552, 'No', 0, 19, 5),
(1553, 'No', 0, 20, 5),
(1554, 'No', 0, 25, 5),
(1555, 'No', 0, 24, 5),
(1556, 'No', 0, 26, 5),
(1557, 'No', 0, 27, 5),
(1558, 'No', 0, 28, 5),
(1559, 'No', 0, 29, 5),
(1560, 'No', 0, 30, 5),
(1561, 'No', 0, 31, 5),
(1562, 'No', 0, 32, 5),
(1563, 'No', 0, 33, 5),
(1564, 'No', 0, 34, 5),
(1565, 'No', 0, 35, 5),
(1566, 'No', 0, 36, 5),
(1567, 'No', 0, 37, 5),
(1568, 'No', 0, 38, 5),
(1569, 'No', 0, 39, 5),
(1570, 'No', 0, 40, 5),
(1571, 'No', 0, 41, 5),
(1572, 'No', 0, 42, 5),
(1573, 'No', 0, 43, 5),
(1574, 'No', 0, 44, 5),
(1575, 'No', 0, 45, 5),
(1576, 'No', 0, 46, 5),
(1577, 'No', 0, 47, 5),
(1578, 'No', 0, 48, 5),
(1579, 'No', 0, 49, 5),
(1580, 'No', 0, 50, 5),
(1581, 'No', 0, 51, 5),
(1582, 'No', 0, 52, 5),
(1583, 'No', 0, 53, 5),
(1584, 'No', 0, 54, 5),
(1585, 'No', 0, 55, 5),
(1586, 'No', 0, 56, 5),
(1587, 'No', 0, 57, 5),
(1588, 'No', 0, 58, 5),
(1589, 'No', 0, 59, 5),
(1590, 'No', 0, 60, 5),
(1591, 'No', 0, 61, 5),
(1592, 'No', 0, 62, 5),
(1593, 'No', 0, 63, 5),
(1594, 'No', 0, 64, 5),
(1595, 'No', 0, 65, 5),
(1596, 'No', 0, 66, 5),
(1597, 'No', 0, 67, 5),
(1598, 'No', 0, 68, 5),
(1599, 'No', 0, 69, 5),
(1600, 'No', 0, 70, 5),
(1601, 'No', 0, 71, 5),
(1602, 'No', 0, 72, 5),
(1603, 'No', 0, 73, 5),
(1604, 'Yes', 1, 74, 5),
(1605, 'Partly', 0.5, 76, 5);

-- --------------------------------------------------------

--
-- Table structure for table `SecurityReadinessIndex`
--

CREATE TABLE `SecurityReadinessIndex` (
  `id` int(11) NOT NULL,
  `resultIndex` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `SecurityReadinessIndex`
--

INSERT INTO `SecurityReadinessIndex` (`id`, `resultIndex`, `date`, `user_id`) VALUES
(74, 33.4, '2021-08-30 17:02:27', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subfactor`
--

CREATE TABLE `subfactor` (
  `subfactor_id` int(11) NOT NULL,
  `subfactor_name` varchar(255) NOT NULL,
  `factor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subfactor`
--

INSERT INTO `subfactor` (`subfactor_id`, `subfactor_name`, `factor_id`) VALUES
(1, 'IT KNOWLEDGE', 1),
(2, 'Trust', 1),
(3, 'Information Security Policy', 3),
(4, 'Information security infrastructure', 3),
(5, 'Security of third party access', 3),
(6, 'Outsourcing', 3),
(7, 'Accountability of assets', 3),
(8, 'Information classification', 3),
(9, 'Security in job definition and Resourcing', 3),
(10, 'User training', 3),
(11, 'Responding to security/threat incidents', 3),
(12, 'Equipment Security', 3),
(13, 'General Controls', 3),
(14, 'Operational Procedure and responsibilities', 3),
(15, 'Media handling and Security', 3),
(16, 'Exchange of Information and software', 3),
(17, 'Business Requirements for Access Control', 3),
(18, 'Mobile computing and telecommuting', 3),
(19, 'Information security infrastructure', 4),
(20, 'Reliability', 4);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(255) NOT NULL,
  `subfactor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`title_id`, `title_name`, `subfactor_id`) VALUES
(1, 'I am ready use organization software if …', 1),
(2, 'I am ready use organization software if …', 2),
(3, 'Information security policy document', 3),
(4, 'Review and Evaluation', 3),
(5, 'Allocation of information security responsibilities', 4),
(6, 'Co-operation between organizations', 4),
(7, 'Independent review of information security', 4),
(8, 'Identification of risks from third party', 5),
(9, 'Security requirements in third party contracts', 5),
(10, 'Security requirements in outsourcing contracts', 6),
(11, 'Inventory of assets', 7),
(12, 'Classification guidelines', 8),
(13, 'Information labeling and handling', 8),
(14, 'Including security in job responsibilities', 9),
(15, 'Confidentiality agreements', 9),
(16, 'Terms and conditions of employment', 9),
(17, 'Information security education and training', 10),
(18, 'Reporting security/threat incidents', 11),
(19, 'Reporting security weaknesses', 11),
(20, 'Equipment location protection', 12),
(21, 'Power Supplies', 12),
(22, 'Equipment Maintenance', 12),
(23, 'Securing of equipment offsite', 12),
(24, 'Secure disposal or re-use of equipment', 12),
(25, 'Removal of property', 13),
(26, 'Documented Operating procedures', 14),
(27, 'Incident management procedures', 14),
(28, 'External facilities management', 14),
(29, 'Management of removable computer media', 15),
(30, 'Information and software exchange agreement', 16),
(31, 'Other forms of information exchange', 16),
(32, 'Access Control Policy', 17),
(33, 'Mobile computing', 18),
(34, 'Telecommuting', 18),
(35, 'Allocation of information security responsibilities', 19),
(36, 'Co-operation between organizations', 19),
(37, 'Independent review of information security', 19),
(38, 'I am ready use organization software if …', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_num` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `em_department` varchar(50) NOT NULL,
  `em_sector` varchar(50) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone_num`, `user_password`, `gender`, `em_department`, `em_sector`, `user_role`) VALUES
(18, 'ali', 'ali@gmail.com', '0182870250', '123', 'Male', 'HRM', 'Education', 'admin'),
(20, 'Farah ', 'farah@gmail.com', '01828702404', '123', 'Female', 'HRM', 'HS', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`factor_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `title_id_FK` (`title_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `SecurityReadinessIndex`
--
ALTER TABLE `SecurityReadinessIndex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`user_id`);

--
-- Indexes for table `subfactor`
--
ALTER TABLE `subfactor`
  ADD PRIMARY KEY (`subfactor_id`),
  ADD KEY `factor_id_FK` (`factor_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`title_id`),
  ADD KEY `subfactor_id_FK` (`subfactor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `factor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1606;

--
-- AUTO_INCREMENT for table `SecurityReadinessIndex`
--
ALTER TABLE `SecurityReadinessIndex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `subfactor`
--
ALTER TABLE `subfactor`
  MODIFY `subfactor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `title_id_FK` FOREIGN KEY (`title_id`) REFERENCES `title` (`title_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SecurityReadinessIndex`
--
ALTER TABLE `SecurityReadinessIndex`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subfactor`
--
ALTER TABLE `subfactor`
  ADD CONSTRAINT `factor_id_FK` FOREIGN KEY (`factor_id`) REFERENCES `factor` (`factor_id`);

--
-- Constraints for table `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `subfactor_id_FK` FOREIGN KEY (`subfactor_id`) REFERENCES `subfactor` (`subfactor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
