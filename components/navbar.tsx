"use client"

import { useState } from "react"
import Link from "next/link"
import { ChevronDown, Menu, X, Settings } from "lucide-react"
import { Button } from "@/components/ui/button"

const services = [
  { name: "Web Development", category: "development", href: "/services?category=development" },
  { name: "Mobile Apps", category: "development", href: "/services?category=development" },
  { name: "Digital Marketing", category: "marketing", href: "/services?category=marketing" },
  { name: "SEO Optimization", category: "marketing", href: "/services?category=marketing" },
  { name: "Brand Strategy", category: "branding", href: "/services?category=branding" },
  { name: "Logo Design", category: "branding", href: "/services?category=branding" },
  { name: "Business Consulting", category: "consulting", href: "/services?category=consulting" },
  { name: "Process Optimization", category: "consulting", href: "/services?category=consulting" },
]

const categories = [
  { name: "Development", value: "development" },
  { name: "Marketing", value: "marketing" },
  { name: "Branding", value: "branding" },
  { name: "Consulting", value: "consulting" },
]

export default function Navbar() {
  const [isDropdownOpen, setIsDropdownOpen] = useState(false)
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false)

  return (
    <nav className="bg-card border-b border-border sticky top-0 z-50 backdrop-blur-sm bg-card/95">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-16">
          {/* Logo */}
          <Link href="/" className="flex items-center space-x-2">
            <div className="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
              <span className="text-primary-foreground font-bold text-lg">B</span>
            </div>
            <span className="text-xl font-bold text-foreground">BusinessPro</span>
          </Link>

          {/* Desktop Navigation */}
          <div className="hidden md:flex items-center space-x-8">
            <Link href="/" className="text-foreground hover:text-primary transition-colors">
              Home
            </Link>

            {/* Services Dropdown */}
            <div className="relative">
              <button
                onClick={() => setIsDropdownOpen(!isDropdownOpen)}
                className="flex items-center space-x-1 text-foreground hover:text-primary transition-colors"
              >
                <span>Services</span>
                <ChevronDown className={`w-4 h-4 transition-transform ${isDropdownOpen ? "rotate-180" : ""}`} />
              </button>

              {isDropdownOpen && (
                <div className="absolute top-full left-0 mt-2 w-80 bg-popover border border-border rounded-lg shadow-lg animate-fade-in-scale">
                  <div className="p-4">
                    <div className="grid grid-cols-2 gap-4">
                      {categories.map((category) => (
                        <div key={category.value} className="space-y-2">
                          <h3 className="font-semibold text-popover-foreground text-sm uppercase tracking-wide">
                            {category.name}
                          </h3>
                          {services
                            .filter((service) => service.category === category.value)
                            .map((service) => (
                              <Link
                                key={service.name}
                                href={service.href}
                                className="block text-sm text-muted-foreground hover:text-primary transition-colors"
                                onClick={() => setIsDropdownOpen(false)}
                              >
                                {service.name}
                              </Link>
                            ))}
                        </div>
                      ))}
                    </div>
                    <div className="mt-4 pt-4 border-t border-border">
                      <Link
                        href="/services"
                        className="text-sm font-medium text-primary hover:text-primary/80 transition-colors"
                        onClick={() => setIsDropdownOpen(false)}
                      >
                        View All Services →
                      </Link>
                    </div>
                  </div>
                </div>
              )}
            </div>

            <Link href="/contact" className="text-foreground hover:text-primary transition-colors">
              Contact
            </Link>

            <Link
              href="/admin"
              className="flex items-center space-x-1 text-muted-foreground hover:text-primary transition-colors"
              title="Admin Panel"
            >
              <Settings className="w-4 h-4" />
              <span className="text-sm">Admin</span>
            </Link>

            <Button asChild>
              <Link href="/contact">Get Started</Link>
            </Button>
          </div>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            className="md:hidden p-2 text-foreground hover:text-primary transition-colors"
          >
            {isMobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
          </button>
        </div>

        {/* Mobile Menu */}
        {isMobileMenuOpen && (
          <div className="md:hidden py-4 animate-fade-in-scale">
            <div className="space-y-4">
              <Link
                href="/"
                className="block text-foreground hover:text-primary transition-colors"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Home
              </Link>
              <Link
                href="/services"
                className="block text-foreground hover:text-primary transition-colors"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Services
              </Link>
              <Link
                href="/contact"
                className="block text-foreground hover:text-primary transition-colors"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Contact
              </Link>
              <Link
                href="/admin"
                className="flex items-center space-x-2 text-muted-foreground hover:text-primary transition-colors"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                <Settings className="w-4 h-4" />
                <span>Admin Panel</span>
              </Link>
              <Button asChild className="w-full">
                <Link href="/contact" onClick={() => setIsMobileMenuOpen(false)}>
                  Get Started
                </Link>
              </Button>
            </div>
          </div>
        )}
      </div>

      {/* Overlay for dropdown */}
      {isDropdownOpen && <div className="fixed inset-0 z-40" onClick={() => setIsDropdownOpen(false)} />}
    </nav>
  )
}
