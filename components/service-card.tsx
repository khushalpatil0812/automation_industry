"use client"

import Image from "next/image"
import { useRouter } from "next/navigation"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Badge } from "@/components/ui/badge"

interface ServiceCardProps {
  id: number // Added id prop for navigation
  title: string
  description: string
  category: string
  image: string
  features?: string[]
}

export default function ServiceCard({ id, title, description, category, image, features }: ServiceCardProps) {
  const router = useRouter() // Added router for navigation

  const handleClick = () => {
    router.push(`/services/${id}`)
  }

  return (
    <Card className="animate-card-hover overflow-hidden group cursor-pointer" onClick={handleClick}>
      <div className="relative h-48 overflow-hidden">
        <Image src={image || "/placeholder.svg"} alt={title} fill className="object-cover animate-image-zoom" />
        <div className="absolute top-4 left-4">
          <Badge variant="secondary" className="bg-primary/90 text-primary-foreground">
            {category}
          </Badge>
        </div>
      </div>
      <CardHeader>
        <CardTitle className="text-xl text-card-foreground">{title}</CardTitle>
        <CardDescription className="text-muted-foreground leading-relaxed">{description}</CardDescription>
      </CardHeader>
      {features && (
        <CardContent>
          <ul className="space-y-1">
            {features.map((feature, index) => (
              <li key={index} className="text-sm text-muted-foreground flex items-center">
                <span className="w-1.5 h-1.5 bg-primary rounded-full mr-2" />
                {feature}
              </li>
            ))}
          </ul>
        </CardContent>
      )}
    </Card>
  )
}
