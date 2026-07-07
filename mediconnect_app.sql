-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 05:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediconnect_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_appointments`
--

CREATE TABLE `accepted_appointments` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_day` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Accepted',
  `accepted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted_appointments`
--

INSERT INTO `accepted_appointments` (`id`, `appointment_id`, `doctor_id`, `patient_id`, `appointment_day`, `appointment_time`, `status`, `accepted_at`) VALUES
(1, 7, 13, 5, '2025-05-07', '22:15:00', 'Accepted', '2025-05-26 23:33:41'),
(2, 7, 13, 5, '2025-05-07', '22:15:00', 'Accepted', '2025-05-26 23:43:24'),
(3, 7, 13, 5, '2025-05-07', '22:15:00', 'Accepted', '2025-05-26 23:55:01'),
(4, 7, 13, 5, '2025-05-07', '22:15:00', 'Accepted', '2025-05-27 23:35:08'),
(5, 10, 10, 1, '2025-04-29', '20:40:00', 'Accepted', '2025-05-27 23:35:15'),
(6, 7, 13, 5, '2025-05-07', '22:15:00', 'Accepted', '2025-05-31 23:22:43'),
(7, 7, 13, 5, '2025-05-07', '22:15:00', 'Accepted', '2025-06-04 11:27:29'),
(8, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-04 12:46:30'),
(9, 12, 18, 9, '2025-06-04', '00:00:00', 'Accepted', '2025-06-04 12:52:04'),
(10, 13, 17, 9, '2025-06-20', '00:00:00', 'Accepted', '2025-06-04 13:12:50'),
(11, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-05 09:16:59'),
(12, 15, 17, 9, '2025-06-05', '00:00:00', 'Accepted', '2025-06-05 10:34:52'),
(13, 12, 18, 9, '2025-06-04', '00:00:00', 'Accepted', '2025-06-05 10:36:00'),
(14, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-05 10:37:12'),
(15, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-05 10:39:15'),
(16, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-05 10:40:01'),
(17, 12, 18, 9, '2025-06-04', '00:00:00', 'Accepted', '2025-06-05 10:43:39'),
(18, 14, 18, 9, '2025-06-26', '00:00:00', 'Accepted', '2025-06-05 10:43:53'),
(19, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-06 05:14:47'),
(20, 15, 17, 9, '2025-06-05', '00:00:00', 'Accepted', '2025-06-06 05:34:49'),
(21, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-06 05:44:23'),
(22, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-06 06:07:17'),
(23, 11, 17, 9, '2025-06-19', '00:00:00', 'Reject', '2025-06-06 06:12:56'),
(24, 11, 17, 9, '2025-06-19', '00:00:00', 'Reject', '2025-06-06 06:13:20'),
(25, 13, 17, 9, '2025-06-20', '00:00:00', 'Reject', '2025-06-06 06:13:37'),
(26, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-06 06:13:54'),
(27, 11, 17, 9, '2025-06-19', '00:00:00', 'Reject', '2025-06-06 13:26:40'),
(28, 11, 17, 9, '2025-06-19', '00:00:00', 'Reject', '2025-06-06 13:27:20'),
(29, 11, 17, 9, '2025-06-19', '00:00:00', 'Accepted', '2025-06-06 19:22:38'),
(30, 13, 17, 9, '2025-06-20', '00:00:00', 'Accepted', '2025-06-06 19:26:43'),
(31, 16, 17, 9, '2025-06-07', '00:00:00', 'Accepted', '2025-06-07 03:15:37'),
(32, 17, 17, 9, '2025-06-07', '00:00:00', 'Reject', '2025-06-07 03:15:50'),
(33, 18, 17, 9, '2025-06-05', '00:00:00', 'Accepted', '2025-06-07 06:16:42'),
(34, 19, 17, 9, '0000-00-00', '00:00:00', 'Reject', '2025-06-07 06:16:58'),
(35, 20, 17, 9, '0000-00-00', '00:00:00', 'Accepted', '2025-06-07 07:32:09'),
(36, 21, 17, 9, '0000-00-00', '20:08:00', 'Accepted', '2025-06-07 07:32:13'),
(37, 22, 17, 9, '2025-06-11', '20:08:00', 'Accepted', '2025-06-07 07:32:17'),
(38, 23, 17, 9, '2025-06-11', '15:22:56', 'Rejected', '2025-06-07 07:32:21'),
(39, 24, 17, 9, '2025-06-09', '15:23:13', 'Rejected', '2025-06-07 07:32:24'),
(40, 25, 17, 9, '2025-06-13', '15:27:17', 'Accepted', '2025-06-08 06:43:19'),
(41, 26, 17, 12, '2025-06-11', '14:42:28', 'Accepted', '2025-06-08 06:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `username`, `email`, `Password`, `role`, `profile_pic`) VALUES
(1, 'waleedrehman', 'waleedrehman2007@gmail.com', 'waleed2007@', 'admin', 'default.png'),
(2, '[murtaza]', '[murtaza@gmail.com]', '[qwer]', '[Admin]', '[default.png]');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_day` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `appointment_day`, `appointment_time`, `created_at`, `name`, `email`, `phone`, `status`, `message`) VALUES
(20, 9, 17, '0000-00-00', '00:00:00', '2025-06-07 07:12:45', 'Umama siddique', 'umama@gmail.com', '03152210948', 'Accepted', ''),
(21, 9, 17, '0000-00-00', '20:08:00', '2025-06-07 10:19:24', 'Umama siddique', 'umama@gmail.com', '03152210948', 'Accepted', 'aaaaaaaaa'),
(27, 9, 17, '2025-06-14', '03:54:11', '2025-06-08 22:54:11', 'Umama siddique', 'umama@gmail.com', '03152210948', 'Pending', 'aaaaaaaaaaaaaaaaaa'),
(28, 9, 17, '2025-06-14', '03:54:17', '2025-06-08 22:54:17', 'Umama siddique', 'umama@gmail.com', '03152210948', 'Pending', 'aaaaaaaaaaaaaaaaaa'),
(29, 9, 17, '2025-06-14', '03:54:25', '2025-06-08 22:54:25', 'Umama siddique', 'umama@gmail.com', '03152210948', 'Pending', 'aaaaaaaaaaaaasssssss');

-- --------------------------------------------------------

--
-- Table structure for table `dashboardlogin`
--

CREATE TABLE `dashboardlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboardlogin`
--

INSERT INTO `dashboardlogin` (`id`, `name`, `email`, `password`) VALUES
(1, 'waleedrehman', 'waleedrehman2007@gmail.com', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `medicine` varchar(255) DEFAULT '',
  `description` text DEFAULT '',
  `letter` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `medicine`, `description`, `letter`) VALUES
(1, 'Asthma', 'Salbutamol', 'Asthma is a respiratory condition marked by spasms in the bronchi.', 'A'),
(2, 'Bronchitis', 'Azithromycin', 'Bronchitis is inflammation of the lining of bronchial tubes.', 'B'),
(3, 'Covid-19', 'Remdesivir', 'Covid-19 is a contagious respiratory illness caused by SARS-CoV-2.', 'C'),
(4, 'Diabetes', 'Metformin', 'Diabetes is a disease that occurs when blood glucose is too high.', 'D'),
(5, 'Eczema', 'Hydrocortisone', 'Eczema is a condition that makes your skin red and itchy.', 'E'),
(6, 'Fever', 'Paracetamol', 'Fever is a temporary increase in your body temperature.', 'F'),
(7, 'Gastritis', 'Omeprazole', 'Gastritis is inflammation of the stomach lining.', 'G'),
(8, 'Hypertension', 'Amlodipine', 'Hypertension is a condition with persistently high blood pressure.', 'H'),
(9, 'Influenza', 'Oseltamivir', 'Influenza is a viral infection that attacks your respiratory system.', 'I'),
(10, 'Jaundice', 'Ursodiol', 'Jaundice is yellowing of the skin caused by liver dysfunction.', 'J'),
(14, 'Cancer', 'Chemotherapy', 'Cancer refers to a group of diseases characterized by uncontrolled cell growth and the ability to invade or spread to other parts of the body.', 'C'),
(17, 'Flu', 'Oseltamivir', 'Influenza, commonly known as the flu, is a viral infection that attacks your respiratory system.', 'F'),
(18, 'Gout', 'Allopurinol', 'Gout is a type of arthritis characterized by sudden, severe attacks of pain, redness, and tenderness in joints.', 'G'),
(22, 'Kidney Stones', 'Tamsulosin', 'Kidney stones are hard deposits made of minerals and salts that form inside your kidneys.', 'K'),
(23, 'Lupus', 'Prednisone', 'Lupus is a systemic autoimmune disease that occurs when your body\'s immune system attacks your own tissues and organs.', 'L'),
(24, 'Malaria', 'Chloroquine', 'Malaria is a life-threatening disease transmitted through the bite of an infected Anopheles mosquito.', 'M'),
(25, 'Neuropathy', 'Gabapentin', 'Neuropathy is damage or dysfunction of one or more nerves, typically causing numbness or weakness.', 'N'),
(26, 'Obesity', 'Orlistat', 'Obesity is a complex disease involving an excessive amount of body fat that increases the risk of other diseases.', 'O'),
(27, 'Pneumonia', 'Amoxicillin', 'Pneumonia is an infection that inflames the air sacs in one or both lungs, which may fill with fluid.', 'P'),
(28, 'Q Fever', 'Doxycycline', 'Q fever is a bacterial infection caused by Coxiella burnetii, found in cattle, sheep, and goats.', 'Q'),
(29, 'Rabies', 'Rabies Vaccine', 'Rabies is a deadly virus spread to people from the saliva of infected animals through bites.', 'R'),
(30, 'Stroke', 'Aspirin', 'Stroke occurs when the blood supply to part of your brain is interrupted or reduced, preventing brain tissue from getting oxygen.', 'S'),
(31, 'Tuberculosis', 'Isoniazid', 'Tuberculosis is a potentially serious infectious bacterial disease that mainly affects the lungs.', 'T'),
(32, 'Ulcer', 'Omeprazole', 'An ulcer is a sore that develops on the lining of the esophagus, stomach, or small intestine.', 'U'),
(33, 'Varicella', 'Acyclovir', 'Varicella, also known as chickenpox, is a highly contagious viral infection causing an itchy, blister-like rash.', 'V'),
(34, 'Whooping Cough', 'Erythromycin', 'Whooping cough is a highly contagious respiratory tract infection that is easily preventable by vaccine.', 'W'),
(35, 'Xerostomia', 'Pilocarpine', 'Xerostomia is the medical term for dry mouth due to lack of saliva.', 'X'),
(36, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever is a viral disease of typically short duration caused by the yellow fever virus.', 'Y'),
(37, 'Zika Virus', 'Supportive Care', 'Zika virus is primarily spread by mosquitoes and often causes fever, rash, joint pain, and conjunctivitis.', 'Z'),
(186, 'AIDS', 'Antiretroviral Therapy', 'AIDS (Acquired Immunodeficiency Syndrome) is a disease caused by the HIV virus, which weakens the immune system. It makes the body unable to fight infections and diseases. Over time, it can lead to life-threatening complications if untreated.', 'A'),
(187, 'Bacterial Vaginosis', 'Metronidazole', 'Bacterial vaginosis is an infection of the vagina caused by an imbalance of natural bacteria. It can lead to symptoms like unusual vaginal discharge, odor, and irritation. It is commonly treated with antibiotics.', 'B'),
(188, 'Celiac Disease', 'Gluten-Free Diet', 'Celiac disease is an autoimmune condition where the ingestion of gluten causes damage to the small intestine. It leads to symptoms like abdominal pain, bloating, and diarrhea. The disease is managed by avoiding gluten-containing foods.', 'C'),
(189, 'Dengue Fever', 'Acetaminophen', 'Dengue fever is a viral infection spread by mosquitoes. It causes high fever, severe headaches, joint pain, and a rash. It can lead to more serious complications if not treated properly, such as bleeding or shock.', 'D'),
(190, 'Endometriosis', 'Hormonal Therapy', 'Endometriosis is a condition where tissue similar to the lining of the uterus grows outside the uterus, causing pain and sometimes infertility. The symptoms can be severe, especially during menstruation, and treatment options include medications or surgery.', 'E'),
(191, 'Fibromyalgia', 'Duloxetine', 'Fibromyalgia is a chronic condition that causes widespread pain and tenderness in the muscles, ligaments, and tendons. People with fibromyalgia may also experience fatigue, sleep disturbances, and memory problems.', 'F'),
(193, 'Hepatitis', 'Interferon', 'Hepatitis is inflammation of the liver, usually caused by a viral infection. It leads to symptoms such as fatigue, jaundice, and abdominal pain. Chronic hepatitis can lead to serious complications like cirrhosis or liver cancer.', 'H'),
(194, 'Irritable Bowel Syndrome (IBS)', 'Loperamide', 'Irritable bowel syndrome (IBS) is a disorder that affects the large intestine. It causes symptoms like cramping, bloating, diarrhea, or constipation. Stress and certain foods can trigger flare-ups.', 'I'),
(195, 'Jock Itch', 'Clotrimazole', 'Jock itch is a fungal infection that causes a red, itchy rash in the groin area. It is often caused by heat, moisture, and friction. It can be treated with antifungal creams or powders.', 'J'),
(196, 'Kawasaki Disease', 'Aspirin', 'Kawasaki disease is a rare condition that causes inflammation in the blood vessels, particularly in children. It leads to fever, rash, and swelling in the hands and feet. If not treated early, it can lead to heart problems.', 'K'),
(197, 'Liver Cirrhosis', 'Lactulose', 'Cirrhosis is scarring of the liver caused by long-term liver damage. It can be caused by chronic alcohol use, viral hepatitis, or fatty liver disease. Symptoms include fatigue, swelling in the legs, and jaundice. Treatment aims to manage symptoms and prevent further damage.', 'L'),
(198, 'Migraines', 'Sumatriptan', 'Migraines are intense, pulsing headaches often accompanied by nausea, vomiting, and sensitivity to light and sound. They can last for hours or days and may be triggered by stress, certain foods, or changes in weather.', 'M'),
(199, 'Nasal Polyps', 'Fluticasone', 'Nasal polyps are non-cancerous growths that form in the nasal passages or sinuses. They can cause blocked nasal passages, a runny nose, and difficulty breathing. Treatment may include medications like nasal steroids or, in severe cases, surgery.', 'N'),
(200, 'Osteoporosis', 'Alendronate', 'Osteoporosis is a condition where bones become weak and brittle, increasing the risk of fractures. It commonly affects older adults, especially women after menopause. Treatment includes medications, weight-bearing exercise, and a healthy diet rich in calcium and vitamin D.', 'O'),
(201, 'Panic Disorder', 'Selective Serotonin Reuptake Inhibitors (SSRIs)', 'Panic disorder is an anxiety condition that causes sudden, intense episodes of fear and discomfort, called panic attacks. These attacks often include a racing heart, difficulty breathing, and dizziness. Treatment can involve therapy and medication.', 'P'),
(202, 'Qatar Fever', 'Doxycycline', 'Qatar fever is a bacterial infection transmitted from animals, particularly livestock, to humans. It causes fever, muscle aches, and fatigue. Early treatment with antibiotics is essential to avoid complications.', 'Q'),
(203, 'Rheumatoid Arthritis', 'Methotrexate', 'Rheumatoid arthritis is an autoimmune disease that causes inflammation in the joints, leading to pain, swelling, and eventual joint damage. It can affect other organs and may require long-term treatment with medication and lifestyle changes.', 'R'),
(204, 'Sinusitis', 'Amoxicillin', 'Sinusitis is inflammation of the sinuses, often caused by an infection. It causes symptoms like facial pain, nasal congestion, and a runny nose. Treatment may include antibiotics if the cause is bacterial, as well as nasal decongestants and pain relief medications.', 'S'),
(205, 'Tinnitus', 'Antihistamines', 'Tinnitus is a condition where a person hears ringing, buzzing, or other noises in the ears. It can be caused by ear infections, exposure to loud noises, or certain medications. There is no cure, but treatments can help manage symptoms.', 'T'),
(206, 'Uterine Fibroids', 'Gonadotropin-Releasing Hormone Agonists', 'Uterine fibroids are non-cancerous growths that form in the uterus. They can cause heavy periods, pelvic pain, and pressure on the bladder or rectum. Treatment options include medications, non-invasive procedures, or surgery.', 'U'),
(207, 'Viral Hepatitis', 'Antiviral Medications', 'Viral hepatitis refers to inflammation of the liver caused by viral infections such as hepatitis A, B, C, D, or E. Symptoms include jaundice, fatigue, and abdominal pain. Vaccines and antiviral medications are used to prevent and treat certain types of hepatitis.', 'V'),
(208, 'Whooping Cough (Pertussis)', 'Azithromycin', 'Whooping cough is a highly contagious bacterial infection that causes severe coughing fits. It is named for the \"whooping\" sound that occurs when a person tries to breathe after coughing. It can be serious, especially for infants and young children.', 'W'),
(209, 'Xanthoma', 'Cholesterol-Lowering Medications', 'Xanthomas are fatty deposits that form under the skin. They are often a sign of high cholesterol or other lipid disorders. Treatment involves managing the underlying condition, such as controlling cholesterol levels with medications or diet changes.', 'X'),
(212, 'Common Cold', 'Acetaminophen', 'The common cold is a viral infection of the upper respiratory tract. It causes symptoms like runny nose, sore throat, cough, and mild fever. It is highly contagious and typically resolves on its own after a few days.', '#'),
(213, 'Flu (Influenza)', 'Oseltamivir', 'The flu is a viral infection that affects the respiratory system, causing symptoms like fever, sore throat, runny nose, and body aches. It spreads easily and can be more severe in children, older adults, or those with other health problems.', '#'),
(214, 'Hypertension (High Blood Pressure)', 'Lisinopril', 'Hypertension is when the force of blood against the walls of the arteries is consistently too high. This condition increases the risk of heart disease, stroke, and kidney damage. It often has no symptoms, which is why it is called the \"silent killer.\"', '#'),
(215, 'Diabetes (Type 2)', 'Metformin', 'Type 2 diabetes is a condition where the body doesn’t use insulin properly or doesn’t make enough insulin. This leads to high blood sugar levels, which can cause symptoms like thirst, frequent urination, and fatigue.', '#'),
(217, 'Arthritis', 'Ibuprofen', 'Arthritis is inflammation of the joints, causing pain, stiffness, and swelling. It can affect one joint or multiple joints. Osteoarthritis and rheumatoid arthritis are the most common types of arthritis.', '#'),
(218, 'Back Pain', 'Acetaminophen', 'Back pain is one of the most common ailments, affecting the lower back, upper back, or neck. It can be caused by muscle strain, poor posture, or conditions like herniated discs and arthritis.', '#'),
(219, 'Cough', 'Dextromethorphan', 'A cough is a reflex action that clears your airways of irritants, mucus, or foreign particles. It can be acute or chronic and can be caused by infections like the cold or flu, allergies, or even smoking.', '#');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `image`, `name`, `designation`, `category`, `facebook`, `instagram`, `twitter`, `created_at`) VALUES
(1, 'nashpati.jpg', 'Waleed Rehman', '', 'dentist', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', '2025-06-01 07:04:16'),
(2, 'nashpati.jpg', 'Waleed Rehman', '', 'dentist', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', '2025-06-01 07:05:27'),
(3, 'nashpati.jpg', 'Waleed Rehman', '', 'dentist', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', '2025-06-01 07:06:02'),
(4, 'rassberies.jpg', 'Waleed Rehman', '', 'dentist', 'https://www.instagram.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', '2025-06-01 07:08:41'),
(7, 'doctorexp.jpg', 'Doctor Ahmed', '', 'Hear Surgon', 'https://www.facebook.com/waleed.rehman.705655', 'https://www.instagram.com/', 'https://www.instagram.com/', '2025-06-03 07:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availiblity`
--

CREATE TABLE `doctor_availiblity` (
  `doctor_id` int(11) NOT NULL,
  `available_day` varchar(50) NOT NULL,
  `available_time_to` varchar(50) NOT NULL,
  `available_time_from` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_availiblity`
--

INSERT INTO `doctor_availiblity` (`doctor_id`, `available_day`, `available_time_to`, `available_time_from`, `id`) VALUES
(17, 'saturday', '15:33', '20:08', 2),
(17, 'monday', '00:21', ' 12:18', 7),
(17, 'friday', '05:25', ' 13:30', 8);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_register`
--

CREATE TABLE `doctor_register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `clinic_address` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.png',
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `bio` varchar(200) DEFAULT NULL,
  `from_time` int(11) DEFAULT NULL,
  `to_time` int(11) DEFAULT NULL,
  `available_day` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_register`
--

INSERT INTO `doctor_register` (`id`, `name`, `email`, `password`, `role`, `phone`, `gender`, `location`, `postal_code`, `clinic_address`, `category`, `qualification`, `experience`, `profile_pic`, `date_time`, `bio`, `from_time`, `to_time`, `available_day`) VALUES
(17, 'Mazz Hassan', 'mazz@gmail.com', '4321', 'doctor', '03152210948', 'male', 'Karachi', '75890', 'Malir, Karachi', 'cardiologist', 'MBBS (SURGONIEN)', 1, '10_doctorexp.jpg', '2025-06-04 15:40:30', 'asasas', NULL, NULL, NULL),
(18, 'yousuf', 'yousuf@gmail.com', '12345', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', '2025-06-04 15:50:57', NULL, NULL, NULL, NULL),
(25, 'Salman Ansari', 'salmanansari@gmail.com', '', '', '03152210948', NULL, '1', NULL, NULL, 'dentist', NULL, NULL, 'default.png', '2025-06-08 12:03:35', NULL, NULL, NULL, NULL),
(28, 'Wlaeed Rehman', 'umairrehman2004@gmail.com', '', '', '03152210948', NULL, '2', NULL, NULL, 'Heart Surgon', NULL, NULL, 'default.png', '2025-06-08 12:10:16', NULL, NULL, NULL, NULL),
(29, 'Wlaeed Rehman', 'umairrehman2004@gmail.com', '', '', '03152210948', NULL, '2', NULL, NULL, 'dentist', NULL, NULL, 'default.png', '2025-06-08 22:08:37', NULL, NULL, NULL, NULL),
(30, 'ghulam murtaza', 'murtaza@gmail.com', '1234', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', '2025-06-09 13:17:05', NULL, NULL, NULL, NULL),
(31, 'hassan', 'hasan@gmail.com', '1234', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', '2025-06-09 13:17:35', NULL, NULL, NULL, NULL),
(32, 'muneza', 'muneza@gmail.com', 'mnbvcxz', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', '2025-06-09 13:18:03', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicontact`
--

CREATE TABLE `medicontact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `card_image` varchar(1000) DEFAULT NULL,
  `banner_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `card_image`, `banner_image`) VALUES
(9, 'Malayria 18', 'qaaaaaaaaqaaaaaaaaaaaaaqaaaaaaaaaaqaaaaaaaaaaaaaqaaaaaaaq', '2025-06-02', '1748824949_5502_card.jpg', '1748824949_5502_banner.jpg'),
(10, 'Mediconnect Web App Created ', 'A blog (a truncation of \"weblog\")[1] is an informational website consisting of discrete, often informal diary-style text entries also known as posts. Posts are typically displayed in reverse chronological order so that the most recent post appears first, at the top of the web page. In the 2000s, blogs were often the work of a single individual, occasionally of a small group, and often covered a single subject or topic. In the 2010s, multi-author blogs (MABs) emerged, featuring the writing of mul', '2025-06-02', '1748830990_4772_card.jpg', '1748830990_4772_banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient_register`
--

CREATE TABLE `patient_register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.png',
  `banner` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_register`
--

INSERT INTO `patient_register` (`id`, `name`, `email`, `password`, `role`, `date_time`, `contact`, `gender`, `profile_pic`, `banner`, `city`, `updated_at`) VALUES
(9, 'Umama siddique', 'umama@gmail.com', '1234', 'patient', '2025-06-04 20:40:00', '03152210948', 'male', '95_doctorexp.jpg', NULL, 'Karachi', NULL),
(12, 'Waleed Rehman', 'waleedrehman2007@gmail.com', 'waleed', 'patient', '2025-06-08 14:06:10', '03152210948', 'male', '66_IMG-20241026-WA0017.jpg', NULL, 'Karachi', '2025-06-08 14:40:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_appointments`
--
ALTER TABLE `accepted_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pt` (`patient_id`),
  ADD KEY `dt` (`doctor_id`);

--
-- Indexes for table `dashboardlogin`
--
ALTER TABLE `dashboardlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_availiblity`
--
ALTER TABLE `doctor_availiblity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_availiblity` (`doctor_id`);

--
-- Indexes for table `doctor_register`
--
ALTER TABLE `doctor_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicontact`
--
ALTER TABLE `medicontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_register`
--
ALTER TABLE `patient_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_appointments`
--
ALTER TABLE `accepted_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dashboardlogin`
--
ALTER TABLE `dashboardlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_availiblity`
--
ALTER TABLE `doctor_availiblity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `medicontact`
--
ALTER TABLE `medicontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient_register`
--
ALTER TABLE `patient_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `dt` FOREIGN KEY (`doctor_id`) REFERENCES `doctor_register` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pt` FOREIGN KEY (`patient_id`) REFERENCES `patient_register` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_availiblity`
--
ALTER TABLE `doctor_availiblity`
  ADD CONSTRAINT `doctor_availiblity` FOREIGN KEY (`doctor_id`) REFERENCES `doctor_register` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
