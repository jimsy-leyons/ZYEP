<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('mcategories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'name' => 'Relocation & Immigration',
                'icon' => '✈️',
                'subcategories' => [
                    ['name' => 'Visa assistance', 'description' => 'Expert help with visa applications. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Immigration lawyers', 'description' => 'Legal professionals specializing in immigration law. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Documentation', 'description' => 'Help with filing and organizing official paperwork. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Translation', 'description' => 'Certified translation of documents. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Apostille', 'description' => 'Apostille and document authentication services. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Embassy appointments', 'description' => 'Booking and managing embassy visits. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'FRRO/permit support', 'description' => 'Foreigner Regional Registration Office permit processing. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Airport pickup', 'description' => 'Safe and reliable airport transfers. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                    ['name' => 'Temporary accommodation', 'description' => 'Short-term stays and transient housing. (Tags: visa, immigration, relocation, passport, permit, foreign worker, expat)'],
                ]
            ],
            [
                'name' => 'Housing & Property',
                'icon' => '🏘️',
                'subcategories' => [
                    ['name' => 'Rental search', 'description' => 'Find the perfect home to rent. (Tags: rent, apartment, broker, housing, tenant)'],
                    ['name' => 'Property brokers', 'description' => 'Real estate agents and brokers. (Tags: rent, apartment, broker, housing, tenant)'],
                    ['name' => 'Co-living', 'description' => 'Shared apartments and community living spaces. (Tags: rent, apartment, broker, housing, tenant)'],
                    ['name' => 'PG accommodation', 'description' => 'Paying guest and student housing. (Tags: rent, apartment, broker, housing, tenant)'],
                    ['name' => 'Lease review', 'description' => 'Professional review of rental agreements. (Tags: rent, apartment, broker, housing, tenant)'],
                    ['name' => 'Home inspection', 'description' => 'Pre-rental and pre-purchase property inspections. (Tags: rent, apartment, broker, housing, tenant)'],
                    ['name' => 'Utility setup', 'description' => 'Assistance with setting up electricity, water, and internet. (Tags: rent, apartment, broker, housing, tenant)'],
                ]
            ],
            [
                'name' => 'Home Services',
                'icon' => '🛠️',
                'subcategories' => [
                    ['name' => 'Plumbing', 'description' => 'Fix leaks, pipes, and water systems. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Electrical', 'description' => 'Wiring, appliance installation, and electrical repairs. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Carpentry', 'description' => 'Woodwork, furniture repair, and custom builds. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Painting', 'description' => 'Interior and exterior house painting. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Appliance repair', 'description' => 'Fix refrigerators, washing machines, and other appliances. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'AC servicing', 'description' => 'Air conditioning maintenance and repair. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Pest control', 'description' => 'Eliminate insects and rodents from your home. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Deep cleaning', 'description' => 'Thorough home and office cleaning services. (Tags: plumber, electrician, repair, maintenance)'],
                    ['name' => 'Smart home setup', 'description' => 'Installation of home automation and security systems. (Tags: plumber, electrician, repair, maintenance)'],
                ]
            ],
            [
                'name' => 'Domestic Help',
                'icon' => '🧹',
                'subcategories' => [
                    ['name' => 'Maid', 'description' => 'Daily or weekly cleaning and household chores. (Tags: maid, housekeeping, domestic worker)'],
                    ['name' => 'Cook', 'description' => 'Professional home cooks and chefs. (Tags: maid, housekeeping, domestic worker)'],
                    ['name' => 'Babysitter', 'description' => 'Trusted childcare for infants and toddlers. (Tags: maid, housekeeping, domestic worker)'],
                    ['name' => 'Nanny', 'description' => 'Full-time or part-time nannies. (Tags: maid, housekeeping, domestic worker)'],
                    ['name' => 'Elder caregiver', 'description' => 'Compassionate care for senior citizens. (Tags: maid, housekeeping, domestic worker)'],
                    ['name' => 'Live-in help', 'description' => '24/7 domestic assistants and caregivers. (Tags: maid, housekeeping, domestic worker)'],
                ]
            ],
            [
                'name' => 'Healthcare',
                'icon' => '🏥',
                'subcategories' => [
                    ['name' => 'Doctors', 'description' => 'General physicians and medical consultations. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Specialists', 'description' => 'Consultations with medical specialists. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Telemedicine', 'description' => 'Online doctor consultations and remote care. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Home nursing', 'description' => 'Professional nursing care at home. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Physiotherapy', 'description' => 'Physical therapy and rehabilitation services. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Diagnostics', 'description' => 'Lab tests and home sample collection. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Ambulance', 'description' => 'Emergency medical transport services. (Tags: doctor, nurse, hospital, health)'],
                    ['name' => 'Mental health', 'description' => 'Therapy, counseling, and psychological support. (Tags: doctor, nurse, hospital, health)'],
                ]
            ],
            [
                'name' => 'Transportation',
                'icon' => '🚗',
                'subcategories' => [
                    ['name' => 'Drivers on call', 'description' => 'Hire temporary drivers for your personal vehicle. (Tags: driver, chauffeur, taxi, mobility)'],
                    ['name' => 'Chauffeurs', 'description' => 'Professional, full-time chauffeurs. (Tags: driver, chauffeur, taxi, mobility)'],
                    ['name' => 'Corporate transport', 'description' => 'Employee commuting and business travel solutions. (Tags: driver, chauffeur, taxi, mobility)'],
                    ['name' => 'Vehicle rental', 'description' => 'Rent cars, bikes, or luxury vehicles. (Tags: driver, chauffeur, taxi, mobility)'],
                    ['name' => 'School transport', 'description' => 'Safe rides for children to and from school. (Tags: driver, chauffeur, taxi, mobility)'],
                    ['name' => 'Logistics', 'description' => 'Goods transport, moving, and courier services. (Tags: driver, chauffeur, taxi, mobility)'],
                ]
            ],
            [
                'name' => 'Childcare & Education',
                'icon' => '📚',
                'subcategories' => [
                    ['name' => 'Daycare', 'description' => 'Childcare centers and after-school programs. (Tags: childcare, school, tutor)'],
                    ['name' => 'Tutors', 'description' => 'Academic tutoring for all subjects and grades. (Tags: childcare, school, tutor)'],
                    ['name' => 'School admissions', 'description' => 'Consulting and help with the school admission process. (Tags: childcare, school, tutor)'],
                    ['name' => 'Language coaching', 'description' => 'Learn new languages or improve fluency. (Tags: childcare, school, tutor)'],
                    ['name' => 'Skill development', 'description' => 'Extracurricular classes and talent building. (Tags: childcare, school, tutor)'],
                ]
            ],
            [
                'name' => 'Pet Services',
                'icon' => '🐾',
                'subcategories' => [
                    ['name' => 'Grooming', 'description' => 'Bathing, haircuts, and spa treatments for pets. (Tags: pet, dog, cat, vet)'],
                    ['name' => 'Boarding', 'description' => 'Safe overnight stays and kennels for pets. (Tags: pet, dog, cat, vet)'],
                    ['name' => 'Veterinary', 'description' => 'Medical care and checkups for animals. (Tags: pet, dog, cat, vet)'],
                    ['name' => 'Walking', 'description' => 'Daily dog walking and exercise services. (Tags: pet, dog, cat, vet)'],
                    ['name' => 'Pet taxi', 'description' => 'Transport for pets to vets or boarding facilities. (Tags: pet, dog, cat, vet)'],
                ]
            ],
            [
                'name' => 'Finance & Banking',
                'icon' => '💼',
                'subcategories' => [
                    ['name' => 'Tax filing', 'description' => 'Income tax returns and corporate tax services. (Tags: banking, tax, finance, remittance)'],
                    ['name' => 'Insurance', 'description' => 'Health, life, vehicle, and property insurance advisors. (Tags: banking, tax, finance, remittance)'],
                    ['name' => 'Investment advisory', 'description' => 'Wealth management and financial planning. (Tags: banking, tax, finance, remittance)'],
                    ['name' => 'Remittance', 'description' => 'International and domestic money transfers. (Tags: banking, tax, finance, remittance)'],
                    ['name' => 'Salary structuring', 'description' => 'Payroll and compensation package consulting. (Tags: banking, tax, finance, remittance)'],
                ]
            ],
            [
                'name' => 'Legal Services',
                'icon' => '⚖️',
                'subcategories' => [
                    ['name' => 'Employment law', 'description' => 'Workplace rights and corporate employment disputes. (Tags: legal, lawyer, compliance)'],
                    ['name' => 'Rental disputes', 'description' => 'Legal help for landlord-tenant disagreements. (Tags: legal, lawyer, compliance)'],
                    ['name' => 'Immigration law', 'description' => 'Legal counsel for visas and citizenship. (Tags: legal, lawyer, compliance)'],
                    ['name' => 'Notary', 'description' => 'Document notarization and official affidavits. (Tags: legal, lawyer, compliance)'],
                    ['name' => 'Compliance', 'description' => 'Corporate compliance and regulatory advisory. (Tags: legal, lawyer, compliance)'],
                ]
            ],
            [
                'name' => 'Career & Professional',
                'icon' => '👔',
                'subcategories' => [
                    ['name' => 'Recruitment', 'description' => 'Hiring services and talent acquisition. (Tags: jobs, career, staffing)'],
                    ['name' => 'Resume writing', 'description' => 'Professional CV and cover letter creation. (Tags: jobs, career, staffing)'],
                    ['name' => 'HR services', 'description' => 'Human resource management and consulting. (Tags: jobs, career, staffing)'],
                    ['name' => 'Payroll', 'description' => 'Salary processing and payroll management. (Tags: jobs, career, staffing)'],
                    ['name' => 'Staffing', 'description' => 'Temporary and permanent staff placement. (Tags: jobs, career, staffing)'],
                    ['name' => 'Freelancers', 'description' => 'Hire independent professionals for projects. (Tags: jobs, career, staffing)'],
                ]
            ],
            [
                'name' => 'Lifestyle & Wellness',
                'icon' => '🧘',
                'subcategories' => [
                    ['name' => 'Salon at home', 'description' => 'Beauty, hair, and spa services delivered home. (Tags: wellness, fitness, beauty)'],
                    ['name' => 'Fitness trainers', 'description' => 'Personal workout and fitness instructors. (Tags: wellness, fitness, beauty)'],
                    ['name' => 'Yoga', 'description' => 'Private and group yoga classes. (Tags: wellness, fitness, beauty)'],
                    ['name' => 'Nutrition', 'description' => 'Dietitians and personalized meal planning. (Tags: wellness, fitness, beauty)'],
                    ['name' => 'Event planners', 'description' => 'Organizers for parties, weddings, and corporate events. (Tags: wellness, fitness, beauty)'],
                ]
            ],
            [
                'name' => 'Concierge Services',
                'icon' => '🛎️',
                'subcategories' => [
                    ['name' => 'Errand running', 'description' => 'Delegating daily tasks and deliveries. (Tags: concierge, assistant, premium)'],
                    ['name' => 'Personal assistant', 'description' => 'Dedicated assistants for administrative support. (Tags: concierge, assistant, premium)'],
                    ['name' => 'Bill payments', 'description' => 'Management of utility and recurring payments. (Tags: concierge, assistant, premium)'],
                    ['name' => 'Queue services', 'description' => 'Hire someone to stand in line or wait for you. (Tags: concierge, assistant, premium)'],
                    ['name' => 'Appointment booking', 'description' => 'Scheduling doctors, salons, and meetings. (Tags: concierge, assistant, premium)'],
                ]
            ],
            [
                'name' => 'Emergency Support',
                'icon' => '🚨',
                'subcategories' => [
                    ['name' => 'Emergency housing', 'description' => 'Urgent short-term accommodation assistance. (Tags: emergency, urgent, support)'],
                    ['name' => 'Crisis support', 'description' => 'Helplines and urgent response services. (Tags: emergency, urgent, support)'],
                    ['name' => 'Legal emergency', 'description' => 'Immediate legal consultation and bail support. (Tags: emergency, urgent, support)'],
                    ['name' => 'Medical emergency', 'description' => 'Urgent healthcare and rapid ambulance dispatch. (Tags: emergency, urgent, support)'],
                ]
            ],
        ];

        foreach ($data as $catData) {
            $parentId = DB::table('mcategories')->insertGetId([
                'name' => $catData['name'],
                'icon' => $catData['icon'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            foreach ($catData['subcategories'] as $subData) {
                DB::table('mcategories')->insert([
                    'parent_id' => $parentId,
                    'name' => $subData['name'],
                    'description' => $subData['description'],
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optional: truncate or delete seeded data
        // For safety in migration rollback, we might want to be careful here
    }
};
