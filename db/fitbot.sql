-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_idnum` text NOT NULL,
  `student_name` text NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_grade` int(11) NOT NULL,
  `student_section` text NOT NULL,
  `student_bdate` date NOT NULL,
  `student_email` text NOT NULL,
  `student_weight` decimal(10,2) NOT NULL COMMENT 'kg',
  `student_height` decimal(10,2) NOT NULL COMMENT 'cm',
  `student_medicalhistory` text NOT NULL,
  `student_allergy` text NOT NULL,
  `student_medication` text NOT NULL,
  `student_plan` text NOT NULL,
  `student_plant_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_idnum`, `student_name`, `student_gender`, `student_grade`, `student_section`, `student_bdate`, `student_email`, `student_weight`, `student_height`, `student_medicalhistory`, `student_allergy`, `student_medication`, `student_plan`, `student_plant_timestamp`, `student_status`) VALUES
(1, '110649', 'Jay Labrador', 'Male', 8, 'B', '1995-12-05', 'jay.labrador1995@gmail.com', 83.00, 173.00, 'none', 'none', 'none', '<h2>Introduction</h2><br />\nHello Jay, thank you for providing your details. Based on your birth date of December 5, 1995, you are currently 28 years old. Let\'s calculate your Body Mass Index (BMI) to understand your current health status better.<br />\n<br />\n<strong>BMI Calculation:</strong><br />\n- <strong>Height:</strong> 173.00 cm (1.73 meters)<br />\n- <strong>Weight:</strong> 83.00 kg<br />\n<br />\n<strong>BMI:</strong> <br />\n\\[ BMI = \\frac{Weight (kg)}{Height (m)^2} \\]<br />\n\\[ BMI = \\frac{83.00}{1.73^2} \\approx 27.7 \\]<br />\n<br />\nA BMI of 27.7 falls into the overweight category (25-29.9). Our goal is to achieve and maintain a normal BMI (18.5-24.9).<br />\n<br />\n<h2>Nutrition and Exercise Plan</h2><br />\nI will provide a comprehensive one-month nutrition and exercise plan that takes into account the availability of ingredients in your local area and offers variety to keep you motivated. Let\'s get started with Week 1:<br />\n<br />\n---<br />\n<br />\n## Week 1<br />\n<br />\n<strong>Day 1:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Steamed rice<br />\n- Scrambled eggs with tomatoes and onions<br />\n- A slice of ripe papaya<br />\n<br />\n<strong>Lunch:</strong><br />\n- Grilled fish (tilapia)<br />\n- Boiled sweet potatoes<br />\n- Mixed vegetable salad with lettuce, cucumber, and carrots<br />\n<br />\n<strong>Dinner:</strong><br />\n- Chicken tinola (with green papaya and malunggay leaves)<br />\n- Brown rice<br />\n- Steamed okra<br />\n<br />\n<strong>Snack:</strong><br />\n- Fresh banana<br />\n<br />\n<strong>Exercise:</strong><br />\n- 30-minute brisk walk<br />\n- 15 minutes of stretching exercises<br />\n<br />\n---<br />\n<br />\n<strong>Day 2:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Oatmeal with fresh mango slices<br />\n- Low-fat milk<br />\n<br />\n<strong>Lunch:</strong><br />\n- Pork sinigang with kangkong, radish, and eggplant<br />\n- Brown rice<br />\n<br />\n<strong>Dinner:</strong><br />\n- Stir-fried tofu with bell peppers and sitaw (string beans)<br />\n- Steamed rice<br />\n<br />\n<strong>Snack:</strong><br />\n- A handful of roasted peanuts<br />\n<br />\n<strong>Exercise:</strong><br />\n- 20 minutes of jogging<br />\n- 10 minutes of core exercises (planks, sit-ups)<br />\n<br />\n---<br />\n<br />\n<strong>Day 3:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Pandesal with peanut butter<br />\n- Boiled egg<br />\n- Fresh calamansi juice<br />\n<br />\n<strong>Lunch:</strong><br />\n- Beef tapa with atchara (pickled papaya)<br />\n- Garlic fried rice<br />\n<br />\n<strong>Dinner:</strong><br />\n- Pinakbet (mixed vegetables with shrimp paste)<br />\n- Grilled eggplant<br />\n<br />\n<strong>Snack:</strong><br />\n- Fresh buko (coconut) water<br />\n<br />\n<strong>Exercise:</strong><br />\n- 30 minutes of cycling<br />\n- 10 minutes of arm exercises (push-ups, tricep dips)<br />\n<br />\n---<br />\n<br />\n<strong>Day 4:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Champorado (chocolate rice porridge) with dried fish<br />\n- Freshly sliced orange<br />\n<br />\n<strong>Lunch:</strong><br />\n- Chicken adobo with mushrooms<br />\n- Steamed rice<br />\n<br />\n<strong>Dinner:</strong><br />\n- Munggo guisado (mung bean stew) with spinach<br />\n- Steamed rice<br />\n<br />\n<strong>Snack:</strong><br />\n- Fresh carrot sticks with hummus<br />\n<br />\n<strong>Exercise:</strong><br />\n- 20 minutes of swimming<br />\n- 15 minutes of leg exercises (lunges, squats)<br />\n<br />\n---<br />\n<br />\n<strong>Day 5:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Tortang talong (eggplant omelette)<br />\n- Steamed rice<br />\n- Fresh pineapple slices<br />\n<br />\n<strong>Lunch:</strong><br />\n- Lechon kawali (crispy pork belly) with lechon sauce<br />\n- Steamed rice<br />\n- Grilled green beans<br />\n<br />\n<strong>Dinner:</strong><br />\n- Sinanglay na tilapia (tilapia wrapped in pechay leaves with coconut milk)<br />\n- Steamed rice<br />\n<br />\n<strong>Snack:</strong><br />\n- Fresh apple<br />\n<br />\n<strong>Exercise:</strong><br />\n- 30-minute dance workout<br />\n- 10 minutes of stretching exercises<br />\n<br />\n---<br />\n<br />\n<strong>Day 6:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Arroz caldo (rice porridge with chicken)<br />\n- Boiled egg<br />\n<br />\n<strong>Lunch:</strong><br />\n- Bicol express (spicy pork in coconut milk)<br />\n- Steamed rice<br />\n<br />\n<strong>Dinner:</strong><br />\n- Ensaladang talong (eggplant salad) with salted egg<br />\n- Grilled fish<br />\n<br />\n<strong>Snack:</strong><br />\n- Fresh guava<br />\n<br />\n<strong>Exercise:</strong><br />\n- 25 minutes of hiking or brisk walking<br />\n- 15 minutes of yoga<br />\n<br />\n---<br />\n<br />\n<strong>Day 7:</strong><br />\n<br />\n<strong>Breakfast:</strong><br />\n- Corned beef with potatoes<br />\n- Steamed rice<br />\n- Fresh watermelon slices<br />\n<br />\n<strong>Lunch:</strong><br />\n- Tinolang manok (chicken soup with green papaya and chili leaves)<br />\n- Steamed rice<br />\n<br />\n<strong>Dinner:</strong><br />\n- Laing (taro leaves in coconut milk)<br />\n- Grilled fish<br />\n<br />\n<strong>Snack:</strong><br />\n- Fresh mango<br />\n<br />\n<strong>Exercise:</strong><br />\n- 20 minutes of rowing or kayaking<br />\n- 10 minutes of body-weight exercises (squats, push-ups)<br />\n<br />\n---<br />\n<br />\nContinue following similar balanced meals with local ingredients for the remaining three weeks. Consistency with this plan, along with regular exercise, will help you work towards a healthier BMI.<br />\n<br />\n<h2>Note for Parents</h2><br />\nAs Jay is an adult, parental guidance is not necessary. However, it is important to consult a healthcare provider before making significant changes to diet or exercise routines, especially if there are underlying health concerns not previously disclosed.<br />\n<br />\nRemember, consistency and balance are key to a healthy lifestyle.<br />\n<br />\nGood luck, and stay healthy!', '2024-06-27 18:31:53', 1),
(2, '110648', 'Girlie Alonzooooo', 'Male', 7, 'A', '1995-12-04', 'jay.labrador1995@gmail.com', 65.00, 173.00, 'none', 'none', 'none', '<h2>Introduction to BMI and Current Status</h2><br />\nBefore diving into the nutrition and exercise plan, let\'s first understand what BMI (Body Mass Index) is and assess your current status. BMI is a simple calculation using a person\'s height and weight. The formula is weight in kilograms divided by the square of height in meters. For you, Girlie Alonzo (65 kg/1.73m^2), your BMI is approximately 21.7, which falls within the <strong>normal weight</strong> range (18.5 – 24.9 according to the World Health Organization).<br />\n<br />\nThis means our primary goal will be to maintain your current BMI while ensuring you are healthy, nourished, and fit. The plan will focus on balanced nutrition and regular physical activity suitable for the context of a student lifestyle.<br />\n<br />\n<h2>Week 1 Plan</h2><br />\n<h2># Nutrition</h2><br />\n<strong>Monday to Sunday Breakfast:</strong><br />\n- Option 1: Scrambled eggs with tomatoes and onions. Serve with a slice of whole grain bread.<br />\n- Option 2: Oatmeal topped with sliced bananas and a drizzle of honey.<br />\n<br />\n<strong>Monday to Sunday Lunch:</strong><br />\n- Grilled chicken or fish with a side of steamed vegetables (okra, eggplant, and ampalaya) and a small serving of brown rice.<br />\n<br />\n<strong>Monday to Sunday Dinner:</strong><br />\n- Vegetable soup (malunggay, squash, string beans) with pieces of lean meat. Serve with a small portion of quinoa or brown rice.<br />\n<br />\n<strong>Snacks:</strong><br />\n- Fresh fruits (bananas, mangoes, or papayas) and a handful of nuts (cashews or peanuts).<br />\n<br />\n<h2># Exercise</h2><br />\n- <strong>Monday</strong>: 30-minute brisk walk or jog.<br />\n- <strong>Tuesday</strong>: Bodyweight exercises (push-ups, sit-ups, planks) - 3 sets of 10 repetitions.<br />\n- <strong>Wednesday</strong>: Rest day or light stretching/yoga.<br />\n- <strong>Thursday</strong>: 45-minute aerobic class or dance.<br />\n- <strong>Friday</strong>: Swimming or cycling for 30 minutes.<br />\n- <strong>Saturday</strong>: Hiking or a more extended walk in nature.<br />\n- <strong>Sunday</strong>: Rest day.<br />\n<br />\n<h2># Hydration</h2>- Aim for at least 8 glasses of water daily. Hydration is crucial in maintaining bodily functions and facilitating digestion.<br />\n<br />\n<h2>Week 2-4 Plan</h2><br />\nFor the subsequent weeks, you may continue following the dietary guidelines laid out in Week 1, with variations in vegetables and proteins to avoid monotony. Incorporate seasonal fruits and vegetables to ensure that your meals are enjoyable and nutritionally diverse. <br />\n<br />\nAlso, consider rotating the exercise routines to include different activities such as badminton, tennis, or any sport you enjoy. Engaging in group activities or sports can also make exercise more enjoyable and sustainable over time.<br />\n<br />\n<h2>Supplemental Tips</h2><br />\n- <strong>Mindfulness and Eating</strong>: Always eat slowly and mindfully, enjoying each bite. This helps in digestion and can prevent overeating.<br />\n- <strong>Sleep</strong>: Aim for 7-9 hours of sleep nightly. Adequate sleep is vital for recovery, especially when you\'re physically active.<br />\n- <strong>Stress Management</strong>: Incorporate stress-relieving activities like journaling, meditating, or even a simple hobby to help manage stress levels.<br />\n<br />\nRemember, maintaining a normal BMI is not just about diet and exercise; it encompasses a holistic approach that includes mental well-being, hydration, sleep, and a balanced lifestyle. Regularly check your BMI to monitor your progress but focus more on how you feel physically and emotionally.', '2024-06-27 18:57:07', 1),
(3, '110688', 'Jokjok Gomez', 'Female', 9, 'B', '2001-01-30', 'jokjok@gmail.com', 43.00, 160.00, '', '', '', '', '2024-06-27 18:32:00', 1),
(4, '110650', 'Gian Gaza', 'Male', 10, 'C', '2008-02-29', 'gian@gmail.com', 25.00, 150.00, '', '', '', 'Given your profile, Gian Gaza, with a height of 150 cm and a weight of 25 kg, your Body Mass Index (BMI) calculation is as follows:<br />\n<br />\n\\[ \\text{BMI} = \\frac{\\text{Weight in kg}}{(\\text{Height in meters})^2} = \\frac{25}{(1.5)^2} = 11.1 \\]<br />\n<br />\nA BMI of 11.1 categorizes you under the <strong>underweight</strong> category. For a 16-year-old, it\'s essential to reach and maintain a healthy BMI to support your growth, energy levels, and overall health. This comprehensive plan will focus on increasing your BMI to a healthier range through balanced nutrition and appropriate exercise. Please consult with a healthcare provider before starting any new diet or exercise program.<br />\n<br />\n<h2><strong>Week 1: Introduction Phase</strong></h2><br />\n<h2># <strong>Nutrition</strong></h2><br />\n<strong>Goals:</strong> Increase caloric intake moderately with nutrient-rich foods.<br />\n<br />\n- <strong>Breakfast:</strong> Scrambled eggs with cheese and whole wheat bread. A banana.<br />\n- <strong>Lunch:</strong> Grilled chicken breast with brown rice and a variety of steamed vegetables.<br />\n- <strong>Dinner:</strong> Baked fish (like tilapia or bangus), sweet potato, and sautéed kangkong.<br />\n- <strong>Snacks:</strong> Peanut butter on whole wheat crackers, yoghurt, and sliced mangoes.<br />\n<br />\n<h2># <strong>Exercise</strong></h2><br />\n<strong>Goals:</strong> Start with light to moderate exercises to build stamina.<br />\n<br />\n- <strong>Monday/Wednesday/Friday:</strong> 30 minutes of brisk walking or cycling.<br />\n- <strong>Tuesday/Thursday:</strong> Basic bodyweight exercises (e.g., squats, lunges) - 2 sets of 10 repetitions.<br />\n<br />\n<h2><strong>Week 2: Building Consistency</strong></h2><br />\n<h2># <strong>Nutrition</strong></h2><br />\n<strong>Goals:</strong> Gradually increase portion sizes and introduce more variety.<br />\n<br />\n- <strong>Breakfast:</strong> Oatmeal with sliced bananas, almonds, and a drizzle of honey. A glass of milk.<br />\n- <strong>Lunch:</strong> Pork Sinigang with brown rice and a side salad.<br />\n- <strong>Dinner:</strong> Beef stir-fry with mixed vegetables and quinoa.<br />\n- <strong>Snacks:</strong> Avocado toast, boiled sweet potatoes, and fresh pineapple chunks.<br />\n<br />\n<h2># <strong>Exercise</strong></h2><br />\n<strong>Goals:</strong> Incorporate light strength training.<br />\n<br />\n- <strong>Monday/Wednesday/Friday:</strong> Continue with brisk walking or cycling, add 10 minutes.<br />\n- <strong>Tuesday/Thursday:</strong> Increase bodyweight exercises to 3 sets of 12 repetitions. Add simple dumbbell exercises if available.<br />\n<br />\n<h2><strong>Week 3: Intensification Phase</strong></h2><br />\n<h2># <strong>Nutrition</strong></h2><br />\n<strong>Goals:</strong> Focus on high-calorie, nutrient-dense foods.<br />\n<br />\n- <strong>Breakfast:</strong> Full-fat Greek yoghurt with granola, berries, and a spoonful of nut butter.<br />\n- <strong>Lunch:</strong> Chicken Adobo with rice and a mixed vegetable stir fry.<br />\n- <strong>Dinner:</strong> Grilled tuna steak, mashed potatoes, and buttered carrots.<br />\n- <strong>Snacks:</strong> Smoothie with milk, bananas, and peanut butter. Boiled eggs.<br />\n<br />\n<h2># <strong>Exercise</strong></h2><br />\n<strong>Goals:</strong> Gradually increase the intensity and variety of workouts.<br />\n<br />\n- <strong>Monday/Wednesday/Friday:</strong> 45 minutes of mixed activity (cycling, jogging).<br />\n- <strong>Tuesday/Thursday:</strong> Continue with strength training, introducing more challenging variations or weights.<br />\n<br />\n<h2><strong>Week 4: Stabilization and Maintenance</strong></h2><br />\n<h2># <strong>Nutrition</strong></h2><br />\n<strong>Goals:</strong> Stabilize eating pattern with balanced, diverse meals.<br />\n<br />\n- <strong>Breakfast:</strong> Egg and vegetable omelet with whole wheat toast. Fresh orange juice.<br />\n- <strong>Lunch:</strong> Grilled bangus with a side of brown rice and pinakbet.<br />\n- <strong>Dinner:</strong> Chicken Tinola with brown rice.<br />\n- <strong>Snacks:</strong> Sliced apples with peanut butter, mixed nuts, and raisins.<br />\n<br />\n<h2># <strong>Exercise</strong></h2><br />\n<strong>Goals:</strong> Establish a regular exercise routine for sustainability.<br />\n<br />\n- <strong>Monday/Wednesday/Friday:</strong> Mix of jogging and brisk walking (50 minutes).<br />\n- <strong>Tuesday/Thursday:</strong> Maintain the strength training regimen, focusing on technique.<br />\n<br />\n<h2><strong>Additional Tips:</strong></h2><br />\n- <strong>Hydration:</strong> Drink at least 8 glasses of water daily.<br />\n- <strong>Sleep:</strong> Aim for 7-9 hours of sleep nightly to aid in growth and recovery.<br />\n- <strong>Monitoring:</strong> Keep track of your weight and BMI weekly to ensure healthy progress.<br />\n<br />\nThis plan is designed as a starting point. Adjustments may be necessary based on how your body responds. Always prioritize your comfort and health, and consult professionals for personalized advice.', '2024-06-27 18:32:01', 1),
(5, '110649', 'Oscar Reyes', 'Male', 11, 'D', '2001-12-12', 'oscarreyes@gmail.com', 45.00, 150.00, 'Heart Failure, Highblood Pressure, lactose intolerance', 'peanuts, poultry products', 'Antibiotics, pain killer', '<h2>Comprehensive One-Month Nutrition and Exercise Plan for Oscar Reyes</h2><br />\n<strong>Personal Details and Health Considerations</strong>:<br />\n- <strong>Age</strong>: 22 years old<br />\n- <strong>Height</strong>: 120 cm<br />\n- <strong>Weight</strong>: 45 kg<br />\n- <strong>Medical History</strong>: Heart Failure, High Blood Pressure<br />\n- <strong>Allergies</strong>: Peanuts, Poultry Products<br />\n- <strong>Medications</strong>: Antibiotics, Pain Killers<br />\n- <strong>Dietary Restrictions</strong>: Lactose Intolerant<br />\n<br />\nGiven Oscar\'s medical history and specific health considerations, this comprehensive plan aims to support achieving and maintaining a normal BMI while addressing nutritional needs and restrictions. First, let\'s calculate your BMI to understand your current status.<br />\n<br />\n<strong>BMI Calculation</strong>:  <br />\nBMI = Weight (kg) / (Height (m))^2  <br />\nBMI = 45 / (1.2)^2 = 31.25<br />\n<br />\nThis BMI places you in the overweight category, indicating the need for a carefully planned diet and exercise routine tailored to your health conditions and restrictions. It\'s crucial to manage your weight to alleviate the strain on your heart and control your blood pressure.<br />\n<br />\n<h2>Week 1: Introduction to Balanced Meals  </h2><br />\n<strong>Day 1 to Day 7 Meal Plan</strong>  <br />\n<br />\n- <strong>Breakfast</strong>: Rolled oats cooked with water, topped with sliced bananas and a drizzle of honey.  <br />\n- <strong>Mid-Morning Snack</strong>: Fresh papaya slices.  <br />\n- <strong>Lunch</strong>: Grilled fish, steamed brown rice, and a side of sautéed kangkong.  <br />\n- <strong>Afternoon Snack</strong>: Guava slices.<br />\n- <strong>Dinner</strong>: Mongo soup with spinach and diced sweet potatoes.  <br />\n<br />\n<strong>Exercise Routine:</strong>  <br />\n- <strong>Morning</strong>: 15-20 minutes of light stretching and walking.  <br />\n- <strong>Evening</strong>: 30 minutes of yoga or tai chi to promote relaxation.  <br />\n<br />\n<h2>Week 2: Incorporating Variety and Nutrition</h2><br />\n<strong>Day 8 to Day 14 Meal Plan</strong><br />\n<br />\n- <strong>Breakfast</strong>: Cassava cake paired with a glass of soy milk.<br />\n- <strong>Mid-Morning Snack</strong>: Sliced mango.<br />\n- <strong>Lunch</strong>: Grilled bangus (milkfish), a serving of quinoa, and malunggay leaves salad.<br />\n- <strong>Afternoon Snack</strong>: Pineapple chunks.<br />\n- <strong>Dinner</strong>: Pumpkin soup served with a small portion of brown rice and steamed okra on the side.<br />\n<br />\n<strong>Exercise Routine:</strong>  <br />\n- <strong>Morning</strong>: 20-25 minutes of walking or cycling at a steady but comfortable pace.<br />\n- <strong>Evening</strong>: Gentle swimming for 30 minutes if accessible, aiming for non-strainful, smooth movements.<br />\n<br />\n<h2>Week 3: Enhancing Flavors Naturally</h2><br />\n<strong>Day 15 to Day 21 Meal Plan</strong><br />\n<br />\n- <strong>Breakfast</strong>: Sweet potato congee topped with a pinch of cinnamon.<br />\n- <strong>Mid-Morning Snack</strong>: Pear slices.<br />\n- <strong>Lunch</strong>: Tofu vegetable stir-fry with eggplant, carrots, and bell peppers, served with brown rice.<br />\n- <strong>Afternoon Snack</strong>: Chilled coconut water.<br />\n- <strong>Dinner</strong>: Vegetable stew with a variety of local vegetables like sitaw (string beans) and kalabasa (squash), seasoned with turmeric and black pepper for an extra heart-health benefit.<br />\n<br />\n<strong>Exercise Routine:</strong>  <br />\n- <strong>Morning</strong>: 25-30 minutes of brisk walking or stationary biking.<br />\n- <strong>Evening</strong>: 20 minutes of strength training focusing on light weights and high reps to avoid strain, especially considering your heart condition.<br />\n<br />\n<h2>Week 4: Consolidation and Maintenance</h2><br />\n<strong>Day 22 to Day 28 Meal Plan</strong><br />\n<br />\n- <strong>Breakfast</strong>: Boiled saba bananas with a sprinkle of flaxseed.<br />\n- <strong>Mid-Morning Snack</strong>: Coconut flesh.<br />\n- <strong>Lunch</strong>: Fish sinigang using tamarind base for natural sourness, paired with brown rice.<br />\n- <strong>Afternoon Snack</strong>: Watermelon slices.<br />\n- <strong>Dinner</strong>: Stir-fried tofu with snap peas and mushrooms, flavored with ginger, served with brown rice.<br />\n<br />\n<strong>Exercise Routine:</strong>  <br />\n- <strong>Morning</strong>: 30 minutes of mixed activity - walking, cycling, or swimming, increasing intensity slightly while being mindful of your condition.<br />\n- <strong>Evening</strong>: Pilates or body balance classes for 30 minutes, focusing on core strength and flexibility.<br />\n<br />\n<strong>Important Notes:</strong><br />\n- Always consult with your healthcare provider before starting any new diet or exercise program, particularly given your medical history.<br />\n- Stay hydrated throughout the day; aim for 8-10 glasses of water.<br />\n- Listen to your body. If you feel discomfort or pain, especially concerning your heart condition, stop the activity and seek medical advice.<br />\n<br />\nThis comprehensive plan combines nutritional balance, variety, and gradual increases in physical activity to support your journey towards a healthier BMI, considering your specific health needs and dietary restrictions. Remember, consistency and mindfulness about your health are key to achieving and maintaining your goals.', '2024-06-27 18:32:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` text NOT NULL,
  `teacher_gender` text NOT NULL,
  `teacher_designation` text NOT NULL,
  `teacher_username` text NOT NULL,
  `teacher_password` text NOT NULL,
  `teacher_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_gender`, `teacher_designation`, `teacher_username`, `teacher_password`, `teacher_status`) VALUES
(1, 'Jay Labradorrrr', 'Male', 'Teacher 2', 'jaylabrador', 'password', 1),
(2, 'sfsdf', 'Male', 'sdfsdf', 'aaaaaa', 'aaaaaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_username` text NOT NULL,
  `user_password` text NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_username`, `user_password`, `user_type`, `user_status`) VALUES
(1, 'admin1', 'admin', 'admin123', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
