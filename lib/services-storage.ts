export interface Service {
  id: number
  title: string
  description: string
  category: string
  categoryValue: string
  image: string
  features: string[]
  createdAt: string
}

export const categories = [
  { name: "All Services", value: "all" },
  { name: "Development", value: "development" },
  { name: "Marketing", value: "marketing" },
  { name: "Branding", value: "branding" },
  { name: "Consulting", value: "consulting" },
]

// Default services data
const defaultServices: Service[] = [
  {
    id: 1,
    title: "Custom Web Development",
    description:
      "Build responsive, scalable web applications tailored to your business needs with modern technologies and best practices.",
    category: "Development",
    categoryValue: "development",
    image: "/modern-web-development.png",
    features: ["Responsive Design", "SEO Optimized", "Fast Loading", "Secure Architecture"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 2,
    title: "Mobile App Development",
    description: "Create native and cross-platform mobile applications that engage users and drive business growth.",
    category: "Development",
    categoryValue: "development",
    image: "/mobile-app-development.png",
    features: ["iOS & Android", "Cross-Platform", "User-Friendly UI", "App Store Ready"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 3,
    title: "Digital Marketing Strategy",
    description: "Comprehensive digital marketing campaigns that increase brand visibility and drive qualified leads.",
    category: "Marketing",
    categoryValue: "marketing",
    image: "/digital-marketing-dashboard.png",
    features: ["Social Media Marketing", "Content Strategy", "Analytics & Reporting", "Lead Generation"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 4,
    title: "SEO Optimization",
    description: "Improve your search engine rankings and organic traffic with proven SEO strategies and techniques.",
    category: "Marketing",
    categoryValue: "marketing",
    image: "/seo-optimization-search-rankings.jpg",
    features: ["Keyword Research", "On-Page SEO", "Technical SEO", "Performance Tracking"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 5,
    title: "Brand Identity Design",
    description: "Create a compelling brand identity that resonates with your target audience and sets you apart.",
    category: "Branding",
    categoryValue: "branding",
    image: "/brand-identity-design-logo.jpg",
    features: ["Logo Design", "Brand Guidelines", "Visual Identity", "Brand Strategy"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 6,
    title: "Brand Strategy Consulting",
    description: "Develop a comprehensive brand strategy that aligns with your business goals and market positioning.",
    category: "Branding",
    categoryValue: "branding",
    image: "/brand-strategy-consulting-meeting.jpg",
    features: ["Market Research", "Competitive Analysis", "Brand Positioning", "Messaging Framework"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 7,
    title: "Business Process Consulting",
    description: "Optimize your business operations and workflows to improve efficiency and reduce costs.",
    category: "Consulting",
    categoryValue: "consulting",
    image: "/business-consulting-process-optimization.jpg",
    features: ["Process Analysis", "Workflow Optimization", "Cost Reduction", "Performance Metrics"],
    createdAt: new Date().toISOString(),
  },
  {
    id: 8,
    title: "Digital Transformation",
    description:
      "Guide your organization through digital transformation to stay competitive in the modern marketplace.",
    category: "Consulting",
    categoryValue: "consulting",
    image: "/digital-transformation.png",
    features: ["Technology Assessment", "Implementation Strategy", "Change Management", "Training & Support"],
    createdAt: new Date().toISOString(),
  },
]

export class ServicesStorage {
  private static STORAGE_KEY = "business_services"

  static getServices(): Service[] {
    if (typeof window === "undefined") return defaultServices

    const stored = localStorage.getItem(this.STORAGE_KEY)
    if (!stored) {
      this.setServices(defaultServices)
      return defaultServices
    }

    try {
      return JSON.parse(stored)
    } catch {
      return defaultServices
    }
  }

  static setServices(services: Service[]): void {
    if (typeof window === "undefined") return
    localStorage.setItem(this.STORAGE_KEY, JSON.stringify(services))
  }

  static addService(service: Omit<Service, "id" | "createdAt">): Service {
    const services = this.getServices()
    const newService: Service = {
      ...service,
      id: Math.max(0, ...services.map((s) => s.id)) + 1,
      createdAt: new Date().toISOString(),
    }

    const updatedServices = [...services, newService]
    this.setServices(updatedServices)
    return newService
  }

  static updateService(id: number, updates: Partial<Service>): Service | null {
    const services = this.getServices()
    const index = services.findIndex((s) => s.id === id)

    if (index === -1) return null

    const updatedService = { ...services[index], ...updates }
    services[index] = updatedService
    this.setServices(services)
    return updatedService
  }

  static deleteService(id: number): boolean {
    const services = this.getServices()
    const filteredServices = services.filter((s) => s.id !== id)

    if (filteredServices.length === services.length) return false

    this.setServices(filteredServices)
    return true
  }
}
