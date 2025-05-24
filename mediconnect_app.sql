-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 02:44 PM
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
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `username`, `email`, `Password`, `role`) VALUES
(1, 'waleedrehman', 'waleedrehman2007@gmail.com', 'waleed2007@', 'admin');

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
(11, 'Asthma', 'Salbutamol', 'Asthma is a chronic inflammatory disease of the airways that causes periodic attacks of coughing, wheezing, shortness of breath, and chest tightness.', 'A'),
(12, 'Asthma', 'Salbutamol', 'Asthma is a chronic condition that affects the airways, making it difficult to breathe due to inflammation and narrowing.', 'A'),
(13, 'Bronchitis', 'Azithromycin', 'Bronchitis causes inflammation of the bronchial tubes and is often triggered by infection or environmental factors.', 'B'),
(14, 'Cancer', 'Chemotherapy', 'Cancer refers to a group of diseases characterized by uncontrolled cell growth and the ability to invade or spread to other parts of the body.', 'C'),
(15, 'Diabetes', 'Metformin', 'Diabetes is a chronic disease that affects how your body turns food into energy and causes elevated blood sugar levels.', 'D'),
(16, 'Eczema', 'Hydrocortisone', 'Eczema is a skin condition that causes inflamed, itchy, cracked, and rough patches, often due to overactive immune response.', 'E'),
(17, 'Flu', 'Oseltamivir', 'Influenza, commonly known as the flu, is a viral infection that attacks your respiratory system.', 'F'),
(18, 'Gout', 'Allopurinol', 'Gout is a type of arthritis characterized by sudden, severe attacks of pain, redness, and tenderness in joints.', 'G'),
(19, 'Hypertension', 'Lisinopril', 'Hypertension, or high blood pressure, is a condition in which the blood vessels have persistently raised pressure.', 'H'),
(20, 'Influenza', 'Zanamivir', 'Influenza is a contagious respiratory illness caused by influenza viruses that infect the nose, throat, and sometimes lungs.', 'I'),
(21, 'Jaundice', 'Phenobarbital', 'Jaundice is a condition in which the skin, whites of the eyes and mucous membranes turn yellow because of a high level of bilirubin.', 'J'),
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
(38, 'Diabetes', 'Metformin', 'Diabetes causes elevated levels of glucose in the blood due to insulin resistance or deficiency.', 'D'),
(39, 'Cancer', 'Chemotherapy', 'Cancer cells grow uncontrollably and may invade nearby tissues or spread to other parts of the body.', 'C'),
(40, 'Malaria', 'Chloroquine', 'Malaria symptoms include fever, chills, and flu-like illness, and can be life-threatening if untreated.', 'M'),
(41, 'Lupus', 'Prednisone', 'Lupus can affect the joints, skin, kidneys, blood cells, brain, heart, and lungs.', 'L'),
(42, 'Stroke', 'Aspirin', 'A stroke needs immediate attention and treatment to prevent brain damage or death.', 'S'),
(43, 'Hypertension', 'Lisinopril', 'High blood pressure often has no symptoms but can cause serious complications like heart disease.', 'H'),
(44, 'Tuberculosis', 'Isoniazid', 'TB spreads through the air when a person with active TB disease coughs or sneezes.', 'T'),
(45, 'Flu', 'Oseltamivir', 'Flu symptoms include fever, cough, sore throat, runny nose, and body aches.', 'F'),
(46, 'Pneumonia', 'Amoxicillin', 'Pneumonia may cause chest pain, fever, and difficulty breathing.', 'P'),
(47, 'Asthma', 'Salbutamol', 'Asthma can be managed with inhalers and by avoiding triggers like allergens and smoke.', 'A'),
(48, 'Eczema', 'Hydrocortisone', 'Eczema can flare up due to environmental triggers and allergens.', 'E'),
(49, 'Gout', 'Allopurinol', 'Gout attacks can occur suddenly, often at night, and affect the big toe.', 'G'),
(50, 'Kidney Stones', 'Tamsulosin', 'Stones may pass on their own or require treatment such as shock wave therapy.', 'K'),
(51, 'Whooping Cough', 'Erythromycin', 'Whooping cough causes severe coughing fits and is especially dangerous for infants.', 'W'),
(52, 'Obesity', 'Orlistat', 'Obesity is linked to increased risk of heart disease, diabetes, and cancer.', 'O'),
(53, 'Rabies', 'Rabies Vaccine', 'If untreated, rabies is almost always fatal after symptoms appear.', 'R'),
(54, 'Neuropathy', 'Gabapentin', 'Symptoms include tingling, pain, numbness, and muscle weakness.', 'N'),
(55, 'Xerostomia', 'Pilocarpine', 'Dry mouth can lead to difficulty speaking, eating, and increased tooth decay.', 'X'),
(56, 'Influenza', 'Zanamivir', 'Influenza is best prevented through annual vaccination.', 'I'),
(57, 'Ulcer', 'Omeprazole', 'Ulcers can result from infection with H. pylori bacteria or use of NSAIDs.', 'U'),
(58, 'Varicella', 'Acyclovir', 'Chickenpox usually affects children and results in an itchy rash.', 'V'),
(59, 'Yellow Fever', 'Yellow Fever Vaccine', 'The virus is transmitted by mosquitoes, especially in tropical areas.', 'Y'),
(60, 'Zika Virus', 'Supportive Care', 'Zika can cause birth defects if a pregnant woman is infected.', 'Z'),
(61, 'Q Fever', 'Doxycycline', 'Q Fever is often transmitted by inhaling dust contaminated by infected animals.', 'Q'),
(62, 'Asthma', 'Salbutamol', 'Asthma is a chronic disease of the lungs that leads to difficulty in breathing due to airway narrowing.', 'A'),
(63, 'Bronchitis', 'Azithromycin', 'Bronchitis is an inflammation of the bronchial tubes causing cough, mucus, and breathing difficulties.', 'B'),
(64, 'Cancer', 'Chemotherapy', 'Cancer occurs when abnormal cells divide uncontrollably and invade nearby tissues or spread throughout the body.', 'C'),
(65, 'Diabetes', 'Metformin', 'Diabetes is a condition that affects how your body turns food into energy, often causing high blood sugar levels.', 'D'),
(66, 'Eczema', 'Hydrocortisone', 'Eczema is a skin condition that causes itching, redness, and irritation due to inflamed skin.', 'E'),
(67, 'Flu', 'Oseltamivir', 'Flu is a contagious respiratory illness caused by influenza viruses, leading to fever, chills, and body aches.', 'F'),
(68, 'Gout', 'Allopurinol', 'Gout is a form of arthritis caused by high levels of uric acid, leading to joint inflammation and pain.', 'G'),
(69, 'Hypertension', 'Lisinopril', 'Hypertension is a condition where the blood pressure in your arteries is consistently too high, increasing risk for heart disease.', 'H'),
(70, 'Influenza', 'Zanamivir', 'Influenza is a viral infection that affects the respiratory system and is highly contagious.', 'I'),
(71, 'Jaundice', 'Phenobarbital', 'Jaundice is a condition where the skin and eyes turn yellow due to high levels of bilirubin in the blood.', 'J'),
(72, 'Kidney Stones', 'Tamsulosin', 'Kidney stones are hard deposits of minerals and salts that form in the kidneys and can cause severe pain.', 'K'),
(73, 'Lupus', 'Prednisone', 'Lupus is an autoimmune disease where the immune system attacks healthy tissues, leading to inflammation and tissue damage.', 'L'),
(74, 'Malaria', 'Chloroquine', 'Malaria is a life-threatening disease transmitted by mosquitoes, characterized by fever, chills, and flu-like symptoms.', 'M'),
(75, 'Neuropathy', 'Gabapentin', 'Neuropathy is nerve damage that leads to symptoms like numbness, tingling, and pain in the affected areas.', 'N'),
(76, 'Obesity', 'Orlistat', 'Obesity is a medical condition characterized by excessive body fat, which increases the risk of various diseases.', 'O'),
(77, 'Pneumonia', 'Amoxicillin', 'Pneumonia is a lung infection that causes difficulty breathing, chest pain, and fever.', 'P'),
(78, 'Q Fever', 'Doxycycline', 'Q fever is a bacterial infection transmitted through animal fluids or dust contaminated with infected animal waste.', 'Q'),
(79, 'Rabies', 'Rabies Vaccine', 'Rabies is a fatal viral disease spread by animal bites, affecting the nervous system and causing paralysis.', 'R'),
(80, 'Stroke', 'Aspirin', 'A stroke occurs when blood flow to part of the brain is interrupted, leading to brain cell damage and potential disability.', 'S'),
(81, 'Tuberculosis', 'Isoniazid', 'Tuberculosis is a bacterial infection that primarily affects the lungs and spreads through the air when an infected person coughs or sneezes.', 'T'),
(82, 'Ulcer', 'Omeprazole', 'An ulcer is an open sore that forms in the lining of the stomach or small intestine, often causing pain and discomfort.', 'U'),
(83, 'Varicella', 'Acyclovir', 'Varicella, also known as chickenpox, is a contagious viral infection that results in an itchy rash with fluid-filled blisters.', 'V'),
(84, 'Whooping Cough', 'Erythromycin', 'Whooping cough is a contagious bacterial infection that causes severe coughing fits, particularly dangerous for infants.', 'W'),
(85, 'Xerostomia', 'Pilocarpine', 'Xerostomia refers to dry mouth caused by reduced saliva production, often leading to difficulty swallowing and speaking.', 'X'),
(86, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever is a viral disease transmitted by mosquitoes that can cause fever, jaundice, and organ failure.', 'Y'),
(87, 'Zika Virus', 'Supportive Care', 'Zika virus is a mosquito-borne illness that causes mild fever, rash, and conjunctivitis, and can be dangerous during pregnancy.', 'Z'),
(88, 'Diabetes', 'Metformin', 'Diabetes is a chronic condition that causes high blood sugar levels due to the body\'s inability to produce or respond to insulin.', 'D'),
(89, 'Cancer', 'Chemotherapy', 'Chemotherapy is a treatment that uses chemicals to kill or slow the growth of cancer cells.', 'C'),
(90, 'Malaria', 'Chloroquine', 'Malaria is caused by parasites transmitted through mosquito bites and leads to symptoms like fever and chills.', 'M'),
(91, 'Lupus', 'Prednisone', 'Lupus can cause symptoms such as fatigue, joint pain, and skin rashes as it affects the immune system.', 'L'),
(92, 'Stroke', 'Aspirin', 'Stroke can be either ischemic or hemorrhagic, and it requires emergency treatment to prevent brain damage.', 'S'),
(93, 'Hypertension', 'Lisinopril', 'Hypertension is known as a silent disease because it often has no symptoms, but it increases the risk of heart attacks and strokes.', 'H'),
(94, 'Tuberculosis', 'Isoniazid', 'Tuberculosis can cause chronic cough, weight loss, and night sweats, and requires long-term antibiotic treatment.', 'T'),
(95, 'Flu', 'Oseltamivir', 'Flu is contagious and often spreads during the colder months, presenting with fever, fatigue, and muscle aches.', 'F'),
(96, 'Pneumonia', 'Amoxicillin', 'Pneumonia can be caused by bacteria, viruses, or fungi and leads to inflammation in the lungs.', 'P'),
(97, 'Asthma', 'Salbutamol', 'Asthma symptoms can include wheezing, coughing, and shortness of breath, often triggered by allergens or respiratory infections.', 'A'),
(98, 'Eczema', 'Hydrocortisone', 'Eczema can cause patches of skin to become inflamed, cracked, and itchy, and is often triggered by environmental factors.', 'E'),
(99, 'Gout', 'Allopurinol', 'Gout is caused by the accumulation of uric acid in the joints, leading to sudden, intense pain and inflammation.', 'G'),
(100, 'Kidney Stones', 'Tamsulosin', 'Kidney stones can form due to dehydration, poor diet, or family history, and may require medical intervention to remove.', 'K'),
(101, 'Whooping Cough', 'Erythromycin', 'Whooping cough can cause severe coughing spells that make it hard to breathe, leading to a “whooping” sound.', 'W'),
(102, 'Obesity', 'Orlistat', 'Obesity is associated with higher risk of cardiovascular diseases, diabetes, and some cancers.', 'O'),
(103, 'Rabies', 'Rabies Vaccine', 'Rabies can be prevented by timely vaccination following exposure to a potentially infected animal bite.', 'R'),
(104, 'Neuropathy', 'Gabapentin', 'Neuropathy symptoms include burning, stabbing, or tingling pain, often affecting the hands or feet.', 'N'),
(105, 'Xerostomia', 'Pilocarpine', 'Xerostomia can be caused by medications, certain diseases, or aging, leading to dry mouth and difficulty swallowing.', 'X'),
(106, 'Influenza', 'Zanamivir', 'Influenza typically peaks in winter and can cause severe complications, especially in young children and the elderly.', 'I'),
(107, 'Ulcer', 'Omeprazole', 'Stomach ulcers are often caused by infection with H. pylori bacteria or long-term use of nonsteroidal anti-inflammatory drugs.', 'U'),
(108, 'Varicella', 'Acyclovir', 'Chickenpox primarily affects children and is characterized by an itchy rash and flu-like symptoms.', 'V'),
(109, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever vaccination is crucial for people traveling to endemic regions, especially sub-Saharan Africa and South America.', 'Y'),
(110, 'Zika Virus', 'Supportive Care', 'Zika virus is particularly dangerous to pregnant women, as it can lead to birth defects such as microcephaly.', 'Z'),
(111, 'Asthma', 'Salbutamol', 'Asthma is a chronic disease that causes the airways in the lungs to narrow, leading to difficulty in breathing.', 'A'),
(112, 'Bronchitis', 'Azithromycin', 'Bronchitis is the inflammation of the bronchial tubes in the lungs, often leading to coughing and mucus production.', 'B'),
(113, 'Cancer', 'Chemotherapy', 'Cancer is a collection of diseases in which cells begin to divide uncontrollably and spread to other parts of the body.', 'C'),
(114, 'Diabetes', 'Metformin', 'Diabetes is a condition that causes the body to become resistant to insulin or stop producing it, leading to high blood sugar levels.', 'D'),
(115, 'Eczema', 'Hydrocortisone', 'Eczema is a chronic condition that causes inflamed, itchy skin, often triggered by allergens or environmental factors.', 'E'),
(116, 'Flu', 'Oseltamivir', 'The flu is a contagious viral infection that affects the respiratory system, leading to fever, chills, and body aches.', 'F'),
(117, 'Gout', 'Allopurinol', 'Gout is a type of arthritis caused by high levels of uric acid, leading to painful joint inflammation, especially in the toes.', 'G'),
(118, 'Hypertension', 'Lisinopril', 'Hypertension is a condition where the blood pressure in the arteries is consistently high, which increases the risk of heart disease.', 'H'),
(119, 'Influenza', 'Zanamivir', 'Influenza is a highly contagious viral infection that causes symptoms such as fever, cough, sore throat, and body aches.', 'I'),
(120, 'Jaundice', 'Phenobarbital', 'Jaundice is a condition where the skin and eyes turn yellow due to excess bilirubin in the blood.', 'J'),
(121, 'Kidney Stones', 'Tamsulosin', 'Kidney stones are hard mineral deposits that form in the kidneys, causing intense pain when they pass through the urinary tract.', 'K'),
(122, 'Lupus', 'Prednisone', 'Lupus is an autoimmune disease where the body’s immune system attacks its own healthy tissues, leading to widespread inflammation.', 'L'),
(123, 'Malaria', 'Chloroquine', 'Malaria is a disease transmitted by mosquitoes, causing symptoms like fever, chills, and fatigue.', 'M'),
(124, 'Neuropathy', 'Gabapentin', 'Neuropathy is a disorder that affects the nerves, leading to symptoms such as pain, numbness, and tingling.', 'N'),
(125, 'Obesity', 'Orlistat', 'Obesity is a medical condition characterized by excess body fat, which increases the risk of various diseases, such as diabetes and heart disease.', 'O'),
(126, 'Pneumonia', 'Amoxicillin', 'Pneumonia is an infection that inflames the air sacs in one or both lungs, leading to symptoms such as fever, cough, and difficulty breathing.', 'P'),
(127, 'Q Fever', 'Doxycycline', 'Q fever is a bacterial infection that can cause symptoms like fever, chills, and fatigue, transmitted by inhaling dust contaminated by animal waste.', 'Q'),
(128, 'Rabies', 'Rabies Vaccine', 'Rabies is a viral disease that affects the nervous system and is transmitted through animal bites, leading to severe neurological symptoms.', 'R'),
(129, 'Stroke', 'Aspirin', 'A stroke occurs when blood flow to the brain is blocked or reduced, causing brain cells to die and resulting in neurological impairments.', 'S'),
(130, 'Tuberculosis', 'Isoniazid', 'Tuberculosis is a bacterial infection that mainly affects the lungs, leading to cough, fever, and weight loss.', 'T'),
(131, 'Ulcer', 'Omeprazole', 'An ulcer is an open sore that forms on the lining of the stomach or small intestine, causing pain and discomfort.', 'U'),
(132, 'Varicella', 'Acyclovir', 'Varicella, or chickenpox, is a highly contagious viral infection characterized by an itchy rash and fluid-filled blisters.', 'V'),
(133, 'Whooping Cough', 'Erythromycin', 'Whooping cough, or pertussis, is a highly contagious bacterial infection that causes severe coughing fits and can be fatal for infants.', 'W'),
(134, 'Xerostomia', 'Pilocarpine', 'Xerostomia, or dry mouth, is a condition where the salivary glands do not produce enough saliva, causing difficulty swallowing and speaking.', 'X'),
(135, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever is a viral disease transmitted by mosquitoes, causing fever, jaundice, and potentially organ failure.', 'Y'),
(136, 'Zika Virus', 'Supportive Care', 'Zika virus is a mosquito-borne illness that causes mild fever, rash, and joint pain but is dangerous for pregnant women due to birth defects.', 'Z'),
(137, 'Diabetes', 'Metformin', 'Diabetes causes high blood sugar levels, leading to a range of symptoms like excessive thirst, frequent urination, and fatigue.', 'D'),
(138, 'Cancer', 'Chemotherapy', 'Chemotherapy is used to kill or slow the growth of cancer cells in the body by targeting rapidly dividing cells.', 'C'),
(139, 'Malaria', 'Chloroquine', 'Malaria is spread by mosquitoes and causes symptoms like fever, chills, and fatigue, with serious complications in severe cases.', 'M'),
(140, 'Lupus', 'Prednisone', 'Lupus can lead to damage of vital organs such as the heart, kidneys, and lungs due to the body’s immune system attacking its tissues.', 'L'),
(141, 'Stroke', 'Aspirin', 'Stroke can be ischemic or hemorrhagic, and immediate medical attention is crucial to reduce brain damage and improve outcomes.', 'S'),
(142, 'Hypertension', 'Lisinopril', 'Hypertension is a condition in which the long-term force of the blood against the artery walls is high, leading to increased heart disease risk.', 'H'),
(143, 'Tuberculosis', 'Isoniazid', 'TB is a contagious infection caused by bacteria, typically affecting the lungs, but it can also spread to other organs.', 'T'),
(144, 'Flu', 'Oseltamivir', 'The flu virus can spread easily through droplets in the air, and vaccines help to reduce its transmission and severity.', 'F'),
(145, 'Pneumonia', 'Amoxicillin', 'Pneumonia is an infection that causes inflammation in the lungs, leading to fever, difficulty breathing, and fatigue.', 'P'),
(146, 'Asthma', 'Salbutamol', 'Asthma can be managed with medications like inhalers that open up the airways and reduce inflammation in the lungs.', 'A'),
(147, 'Eczema', 'Hydrocortisone', 'Eczema flare-ups can be triggered by factors like stress, irritants, and allergens, and require long-term management.', 'E'),
(148, 'Gout', 'Allopurinol', 'Gout is characterized by sudden, severe attacks of pain in the joints, often affecting the big toe, caused by uric acid buildup.', 'G'),
(149, 'Kidney Stones', 'Tamsulosin', 'Kidney stones are small, hard deposits that form in the kidneys and may require surgery or medication to remove or dissolve them.', 'K'),
(150, 'Whooping Cough', 'Erythromycin', 'Whooping cough is a bacterial infection that primarily affects children and can lead to serious complications like pneumonia and seizures.', 'W'),
(151, 'Obesity', 'Orlistat', 'Obesity is defined by excessive body fat and is a leading cause of various health issues, including heart disease and type 2 diabetes.', 'O'),
(152, 'Rabies', 'Rabies Vaccine', 'Rabies is fatal once symptoms appear, but prompt post-exposure treatment with a rabies vaccine can prevent death if administered in time.', 'R'),
(153, 'Neuropathy', 'Gabapentin', 'Neuropathy can be caused by diabetes, infections, or certain medications and leads to abnormal nerve function, often resulting in pain.', 'N'),
(154, 'Xerostomia', 'Pilocarpine', 'Xerostomia is commonly associated with medication side effects and can lead to dry mouth, difficulty eating, and increased dental problems.', 'X'),
(155, 'Influenza', 'Zanamivir', 'Influenza viruses are highly contagious, and seasonal vaccines help to reduce the number of infections and associated complications.', 'I'),
(156, 'Ulcer', 'Omeprazole', 'Stomach ulcers are often caused by infection with H. pylori bacteria or prolonged use of pain-relieving medications, like NSAIDs.', 'U'),
(157, 'Varicella', 'Acyclovir', 'Chickenpox is highly contagious and presents with an itchy rash, fever, and tiredness, often resulting in complications in adults.', 'V'),
(158, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever is transmitted by mosquitoes and primarily affects people in tropical and subtropical areas.', 'Y'),
(159, 'Zika Virus', 'Supportive Care', 'Zika virus infections can cause symptoms like fever, rash, and joint pain, and are particularly dangerous to pregnant women.', 'Z'),
(160, 'Asthma', 'Salbutamol', 'Asthma is a disease that makes it hard to breathe. It happens when the airways in your lungs get narrow or inflamed, causing coughing, wheezing, and shortness of breath. It can be triggered by allergies, cold air, or exercise.', 'A'),
(161, 'Bronchitis', 'Azithromycin', 'Bronchitis is a condition where the airways in your lungs become swollen and irritated. This leads to a persistent cough, which might bring up mucus. It can be caused by a virus or bacteria.', 'B'),
(162, 'Cancer', 'Chemotherapy', 'Cancer is when abnormal cells in the body grow uncontrollably. These cells can form lumps or tumors and can spread to other parts of the body. It can affect almost any part of the body and needs special treatments like chemotherapy or surgery.', 'C'),
(163, 'Diabetes', 'Metformin', 'Diabetes is a disease that affects how your body uses blood sugar (glucose). It can cause high blood sugar levels and lead to symptoms like thirst, frequent urination, and tiredness. It happens because the body either doesn\'t make enough insulin or can\'t use it properly.', 'D'),
(164, 'Eczema', 'Hydrocortisone', 'Eczema is a skin condition where your skin becomes red, itchy, and inflamed. It can be triggered by things like allergies, dry air, or stress. People with eczema often have dry skin and might experience flare-ups with redness and irritation.', 'E'),
(165, 'Flu', 'Oseltamivir', 'The flu is a viral infection that affects the respiratory system, causing symptoms like fever, sore throat, runny nose, and body aches. It spreads easily and can be more severe in children, older adults, or those with other health problems.', 'F'),
(166, 'Gout', 'Allopurinol', 'Gout is a type of arthritis that happens when too much uric acid builds up in the body. It causes sudden, intense pain and swelling, often in the big toe, and can be triggered by eating certain foods or drinking alcohol.', 'G'),
(167, 'Hypertension', 'Lisinopril', 'Hypertension, also known as high blood pressure, happens when the force of blood against the walls of the arteries is too high. Over time, this can cause damage to your heart, kidneys, and other organs, increasing the risk of heart disease and stroke.', 'H'),
(168, 'Influenza', 'Zanamivir', 'Influenza, or the flu, is a contagious viral infection that affects your lungs and airways. It causes fever, chills, sore throat, body aches, and fatigue. Flu season often happens in the colder months and can lead to serious complications in some people.', 'I'),
(169, 'Jaundice', 'Phenobarbital', 'Jaundice is a condition where the skin and the whites of the eyes turn yellow. It happens when there is too much bilirubin in the body, which could be caused by liver problems or other conditions affecting the liver or bile ducts.', 'J'),
(170, 'Kidney Stones', 'Tamsulosin', 'Kidney stones are small, hard deposits that form in the kidneys. They can cause severe pain when they move through the urinary tract. Drinking plenty of water and making dietary changes can help prevent them from forming.', 'K'),
(171, 'Lupus', 'Prednisone', 'Lupus is an autoimmune disease where the body’s immune system attacks healthy tissues and organs. It can cause symptoms like joint pain, rashes, and fatigue. The disease can affect various parts of the body, including the skin, kidneys, and heart.', 'L'),
(172, 'Malaria', 'Chloroquine', 'Malaria is a disease caused by a parasite that is spread through mosquito bites. It causes symptoms like fever, chills, and body aches. Malaria is common in tropical and subtropical regions, and if untreated, it can be life-threatening.', 'M'),
(173, 'Neuropathy', 'Gabapentin', 'Neuropathy refers to nerve damage, often causing pain, numbness, or tingling in the hands or feet. It can be caused by diseases like diabetes, infections, or injuries to the nerves. It can make it hard to feel normal sensations or even cause burning pain.', 'N'),
(174, 'Obesity', 'Orlistat', 'Obesity is when a person has too much body fat. It increases the risk of many health problems, like diabetes, heart disease, and sleep apnea. Eating a balanced diet and exercising regularly can help prevent or manage obesity.', 'O'),
(175, 'Pneumonia', 'Amoxicillin', 'Pneumonia is an infection that inflames the air sacs in one or both lungs. It causes symptoms like cough, fever, chest pain, and difficulty breathing. Pneumonia can be caused by bacteria, viruses, or fungi and needs treatment with antibiotics or antivirals.', 'P'),
(176, 'Q Fever', 'Doxycycline', 'Q fever is a bacterial infection that people can get from animals, especially farm animals like cows or sheep. It causes symptoms like fever, headache, and fatigue. It can be treated with antibiotics, but some people may develop long-term symptoms.', 'Q'),
(177, 'Rabies', 'Rabies Vaccine', 'Rabies is a viral disease that is passed to humans through bites from infected animals. It affects the nervous system and can cause confusion, aggression, and paralysis. Once symptoms appear, it is almost always fatal, but it can be prevented by vaccination if treated quickly after exposure.', 'R'),
(178, 'Stroke', 'Aspirin', 'A stroke happens when blood flow to part of the brain is blocked or reduced. This can lead to brain damage and cause symptoms like difficulty speaking, weakness on one side of the body, or sudden confusion. Getting help immediately can reduce the damage and save lives.', 'S'),
(179, 'Tuberculosis', 'Isoniazid', 'Tuberculosis (TB) is a bacterial infection that usually affects the lungs but can spread to other parts of the body. It causes coughing, chest pain, and weight loss. TB is contagious and can be treated with a combination of antibiotics.', 'T'),
(180, 'Ulcer', 'Omeprazole', 'An ulcer is an open sore that forms on the lining of the stomach or small intestine. It can cause stomach pain, bloating, and indigestion. Ulcers are often caused by an infection with bacteria called H. pylori or by the long-term use of pain medications like aspirin.', 'U'),
(181, 'Varicella', 'Acyclovir', 'Varicella, also known as chickenpox, is a contagious disease caused by a virus. It causes an itchy rash, fever, and tiredness. Although it mostly affects children, adults can also get chickenpox and may experience more severe symptoms.', 'V'),
(182, 'Whooping Cough', 'Erythromycin', 'Whooping cough is a bacterial infection that causes severe coughing spells, making it hard to breathe. It gets its name from the “whooping” sound heard when a person breathes in after coughing. It’s especially dangerous for babies and young children.', 'W'),
(183, 'Xerostomia', 'Pilocarpine', 'Xerostomia, or dry mouth, occurs when your mouth doesn’t produce enough saliva. This can make it hard to speak, swallow, or taste food. It can be caused by medications, dehydration, or certain diseases, and it can lead to other oral problems like tooth decay and gum disease.', 'X'),
(184, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever is a viral disease spread by mosquitoes, causing symptoms like fever, headache, and jaundice (yellowing of the skin). It can be serious or even fatal, especially if not treated. A vaccine is available for prevention.', 'Y'),
(185, 'Zika Virus', 'Supportive Care', 'Zika virus is spread by mosquitoes and causes symptoms like fever, rash, and joint pain. While it usually isn’t severe, it can be dangerous for pregnant women as it may cause birth defects in babies, including microcephaly (a smaller-than-normal head).', 'Z'),
(186, 'AIDS', 'Antiretroviral Therapy', 'AIDS (Acquired Immunodeficiency Syndrome) is a disease caused by the HIV virus, which weakens the immune system. It makes the body unable to fight infections and diseases. Over time, it can lead to life-threatening complications if untreated.', 'A'),
(187, 'Bacterial Vaginosis', 'Metronidazole', 'Bacterial vaginosis is an infection of the vagina caused by an imbalance of natural bacteria. It can lead to symptoms like unusual vaginal discharge, odor, and irritation. It is commonly treated with antibiotics.', 'B'),
(188, 'Celiac Disease', 'Gluten-Free Diet', 'Celiac disease is an autoimmune condition where the ingestion of gluten causes damage to the small intestine. It leads to symptoms like abdominal pain, bloating, and diarrhea. The disease is managed by avoiding gluten-containing foods.', 'C'),
(189, 'Dengue Fever', 'Acetaminophen', 'Dengue fever is a viral infection spread by mosquitoes. It causes high fever, severe headaches, joint pain, and a rash. It can lead to more serious complications if not treated properly, such as bleeding or shock.', 'D'),
(190, 'Endometriosis', 'Hormonal Therapy', 'Endometriosis is a condition where tissue similar to the lining of the uterus grows outside the uterus, causing pain and sometimes infertility. The symptoms can be severe, especially during menstruation, and treatment options include medications or surgery.', 'E'),
(191, 'Fibromyalgia', 'Duloxetine', 'Fibromyalgia is a chronic condition that causes widespread pain and tenderness in the muscles, ligaments, and tendons. People with fibromyalgia may also experience fatigue, sleep disturbances, and memory problems.', 'F'),
(192, 'Gastritis', 'Omeprazole', 'Gastritis is an inflammation of the stomach lining, often caused by an infection or irritation from alcohol, certain medications, or stress. It can lead to symptoms like stomach pain, nausea, and indigestion.', 'G'),
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
(210, 'Yellow Fever', 'Yellow Fever Vaccine', 'Yellow fever is a viral disease spread by mosquitoes. It causes symptoms like fever, headache, and jaundice. The infection can be severe, and there is no specific treatment other than supportive care. A vaccine is available to prevent it.', 'Y'),
(211, 'Zika Virus', 'No Specific Treatment', 'Zika virus is transmitted by mosquitoes and can cause symptoms such as fever, rash, and joint pain. It is particularly dangerous for pregnant women because it can lead to birth defects. There is no specific treatment, but the symptoms can be managed with supportive care.', 'Z'),
(212, 'Common Cold', 'Acetaminophen', 'The common cold is a viral infection of the upper respiratory tract. It causes symptoms like runny nose, sore throat, cough, and mild fever. It is highly contagious and typically resolves on its own after a few days.', '#'),
(213, 'Flu (Influenza)', 'Oseltamivir', 'The flu is a viral infection that affects the respiratory system, causing symptoms like fever, sore throat, runny nose, and body aches. It spreads easily and can be more severe in children, older adults, or those with other health problems.', '#'),
(214, 'Hypertension (High Blood Pressure)', 'Lisinopril', 'Hypertension is when the force of blood against the walls of the arteries is consistently too high. This condition increases the risk of heart disease, stroke, and kidney damage. It often has no symptoms, which is why it is called the \"silent killer.\"', '#'),
(215, 'Diabetes (Type 2)', 'Metformin', 'Type 2 diabetes is a condition where the body doesn’t use insulin properly or doesn’t make enough insulin. This leads to high blood sugar levels, which can cause symptoms like thirst, frequent urination, and fatigue.', '#'),
(216, 'Asthma', 'Salbutamol', 'Asthma is a chronic lung disease where the airways become inflamed and narrowed, causing difficulty breathing, wheezing, and coughing. It can be triggered by allergens, exercise, or cold air, and is managed with inhalers.', '#'),
(217, 'Arthritis', 'Ibuprofen', 'Arthritis is inflammation of the joints, causing pain, stiffness, and swelling. It can affect one joint or multiple joints. Osteoarthritis and rheumatoid arthritis are the most common types of arthritis.', '#'),
(218, 'Back Pain', 'Acetaminophen', 'Back pain is one of the most common ailments, affecting the lower back, upper back, or neck. It can be caused by muscle strain, poor posture, or conditions like herniated discs and arthritis.', '#'),
(219, 'Cough', 'Dextromethorphan', 'A cough is a reflex action that clears your airways of irritants, mucus, or foreign particles. It can be acute or chronic and can be caused by infections like the cold or flu, allergies, or even smoking.', '#'),
(220, 'Obesity', 'Orlistat', 'Obesity is when a person has an excessive amount of body fat, which increases the risk of developing health problems like diabetes, heart disease, and certain cancers. It is often caused by overeating and a sedentary lifestyle.', '#'),
(221, 'Pneumonia', 'Amoxicillin', 'Pneumonia is an infection that inflames the air sacs in the lungs, which can cause symptoms like fever, cough, shortness of breath, and chest pain. It can be caused by bacteria, viruses, or fungi and may require antibiotics or antivirals.', '#');

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
(20, 'monday', '08:00', ' 13:00', 1),
(20, 'wednesday', '17:00', ' 14:00', 2),
(20, 'friday', '00:00', ' 17:00', 3),
(18, 'sunday', '14:32', ' 04:34', 4),
(18, 'sunday', '14:32', ' 04:34', 5);

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
  `profile_pic` varchar(255) DEFAULT NULL,
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
(16, 'Wlaeed Rehman', 'waleedrehman2007@gmail.com', '123456', 'doctor', '03152210948', NULL, 'Karachi', '75890', 'Malir, Karachi', 'dentist', 'MBBS (Orthodontics)', 1, NULL, '2025-05-17 02:06:02', 'Im a Dentist from karachi', 0, 0, 'Array'),
(17, 'Umair Rehman', 'umairrehman2004@gmail.com', 'umair123', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-17 12:09:32', NULL, NULL, NULL, NULL),
(18, 'Waleed Rehman', 'waleedrehman2007@gmail.com', 'waleed123', 'doctor', '03152210948', 'male', 'Karachi', '75890', 'Malir, Karachi', 'dentist', 'MBBS (SURGONIEN)', 2, 'imagedata/55_IMG-20241026-WA0017.jpg', '2025-05-17 21:42:43', 'Bio doctors\" refers to a doctor specializing in biological sciences, often focusing on areas like genetics, microbiology, or cell biology. They may also be involved in clinical settings, specializing ', 0, 0, 'wednesday'),
(19, 'Muhammad Umair', 'umairrehman2004@gmail.com', 'umair', 'doctor', '03152210948', 'male', 'Lahore', '75890', 'Malir, Karachi', 'surgeon', 'MBBS (SURGONIEN)', 2, 'imagedata/12_dash.png', '2025-05-18 01:19:28', 'I am haert surgon', NULL, NULL, NULL),
(20, 'Dr Wlaeed Rehman', 'waleedrehman2007@gmail.com', '7878990', 'doctor', '03152210948', 'male', 'Karachi', '75890', 'Malir, Karachi', 'dentist', 'MBBS (SURGONIEN)', 2, 'imagedata/4_IMG-20241026-WA0017.jpg', '2025-05-19 00:52:10', 'Dr. Ahmad Ali is a skilled and experienced dentist with over 10 years of practice in dental care. He completed his BDS degree from the University of Karachi and has participated in various national an', NULL, NULL, NULL),
(21, 'Dr Umair Rehman', 'umairrehman2004@gmail.com', '1234', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 01:40:13', NULL, NULL, NULL, NULL),
(22, 'Abbas haider', 'abbashaider@gmail.com', 'abbas', 'doctor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-21 03:05:24', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `medicontact`
--

INSERT INTO `medicontact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Waleed Rehman', 'waleedrehman2007@gmail.com', 'Order Inquiry', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

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
  `profile_pic` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_register`
--

INSERT INTO `patient_register` (`id`, `name`, `email`, `password`, `role`, `date_time`, `contact`, `gender`, `profile_pic`, `banner`, `city`) VALUES
(1, 'Fatima', 'fatima@gmail.com', '1234', 'patient', '2025-05-09 04:52:42', '03152210948', 'female', 'images/20_rose.jpg', NULL, 'Karachi'),
(2, 'Waleed Rehman', 'waleedrehman@gmail.com', 'aaaaaa', 'patient', '2025-05-09 04:52:48', NULL, NULL, NULL, NULL, NULL),
(3, 'Waleed Rehman', 'waleedrehman@gmail.com', 'aaaaaa', 'patient', '2025-05-09 05:27:45', NULL, NULL, NULL, NULL, NULL),
(4, 'Waleed Rehman', 'waleedrehman@gmail.com', '123', 'patient', '2025-05-09 05:28:00', NULL, NULL, NULL, NULL, NULL),
(5, 'Hammad', 'hammad@gmail.com', 'hammad', 'patient', '2025-05-09 07:01:10', NULL, NULL, NULL, NULL, NULL),
(6, 'Hammad', 'hammad@gmail.com', 'hammad', 'patient', '2025-05-19 17:13:01', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `doctor_availiblity`
--
ALTER TABLE `doctor_availiblity`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `patient_register`
--
ALTER TABLE `patient_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dashboardlogin`
--
ALTER TABLE `dashboardlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `doctor_availiblity`
--
ALTER TABLE `doctor_availiblity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `medicontact`
--
ALTER TABLE `medicontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_register`
--
ALTER TABLE `patient_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
